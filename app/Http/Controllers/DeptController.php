<?php

namespace App\Http\Controllers;
use App\Models\Dept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeptController extends Controller
{
    public function index()
    {
        $mst_dept = Dept::select('id', 'dept', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_dept]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'dept' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'


         $mst_dept = Dept::create([
             'dept' => $request->dept,    
             'user_id' => $user_id,         
         ]);
        return response (['data' => $mst_dept]);
    }
    public function update(Request $request, $id)
{
    // Cari Dept berdasarkan ID
    $dept = Dept::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'dept' => 'required|max:255',
    ]);

    // Update data dept
    $dept->update([
        'dept' => $request->dept,  // Update data dept
    ]);

    return response(['data' => $dept]);
}
public function destroy($id)
{
    // Cari Dept berdasarkan ID
    $dept = Dept::findOrFail($id);

    // Hapus Dept
    $dept->delete();

    return response(['message' => 'Department deleted successfully']);
}

}
