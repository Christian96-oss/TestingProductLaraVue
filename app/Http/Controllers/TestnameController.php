<?php

namespace App\Http\Controllers;
use App\Models\Testname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestnameController extends Controller
{
    public function index()
    {
        $mst_test_name = Testname::select('id', 'test_name', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_test_name]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'

         $mst_test_name = Testname::create([
             'test_name' => $request->test_name,    
             'user_id' => $user_id,            
         ]);
        return response (['data' => $mst_test_name]);
    }
    public function update(Request $request, $id)
{
    // Cari Testname berdasarkan ID
    $testname = Testname::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'test_name' => 'required|max:255',
    ]);

    // Update Testname
    $testname->update([
        'test_name' => $request->test_name,  // Update data test_name
    ]);

    return response(['data' => $testname]);
}
public function destroy($id)
{
    // Cari Testname berdasarkan ID
    $testname = Testname::findOrFail($id);

    // Hapus Testname
    $testname->delete();

    return response(['message' => 'Testname deleted successfully']);
}

}
