<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'user_id', 'name', 'access', 'plant', 'email', 'apps', 'dept', 'qa', 'updated_at')->get();
        return response(['data' => $users]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'access' => 'required|'.Rule::in('1', '2'),
            'plant' => 'required|'.Rule::in('1', '2', '3'),
            'email' => 'required|unique:users',
            'apps' => 'required|'.Rule::in('NSS', 'STM', 'CHK'),
            'dept' => 'required|'.Rule::in('LAB', 'TA', 'QA'),
            'qa' => 'required|'.Rule::in('ETS', 'INP', 'INC'),
        ]);
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        return response (['data' => $user]);
    }  
    public function update(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
        // Validasi data yang masuk
        $request->validate([
            'user_id' => 'required|max:255',
            'name' => 'required|max:255',
            'password' => 'nullable|max:255', // Password is nullable to allow not updating it
            'access' => 'required|' . Rule::in('1', '2'),
            'plant' => 'required|' . Rule::in('1', '2', '3'),
            'email' => 'required|unique:users,email,' . $id, // Exclude current user for unique validation
            'apps' => 'required|' . Rule::in('NSS', 'STM', 'CHK'),
            'dept' => 'required|' . Rule::in('LAB', 'TA', 'QA'),
            'qa' => 'required|' . Rule::in('ETS', 'INP', 'INC'),
        ]);
        // Hash password only if provided
        if ($request->filled('password')) {
            $request['password'] = Hash::make($request->password);
        } else {
            // Remove password from the request data if not provided to avoid overwriting it with null
            $request->request->remove('password');
        }
        // Update user
        $user->update($request->all());

        return response(['data' => $user]);
    }
    public function destroy($id)
{
    // Cari user berdasarkan ID
    $user = User::find($id);

    // Jika user tidak ditemukan, kembalikan pesan error
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Hapus user dari database
    $user->delete();

    // Kembalikan respon sukses
    return response()->json(['message' => 'User deleted successfully']);
}

    }
