<?php

namespace App\Http\Controllers;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    public function index()
    {
        $mst_family = Family::select('id', 'family', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_family]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'family' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'

         // Menyimpan data keluarga dengan user_id dan record_date
         $mst_family = Family::create([
             'family' => $request->family,    // Data keluarga dari request
             'user_id' => $user_id,            // Menyimpan ID pengguna yang sedang l         // Menyimpan tanggal dan waktu saat ini
         ]);
        return response (['data' => $mst_family]);
    }
    public function update(Request $request, $id)
{
    // Cari Family berdasarkan ID
    $family = Family::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'family' => 'required|max:255',
    ]);

    // Update Family
    $family->update([
        'family' => $request->family,  // Update data keluarga
    ]);

    return response(['data' => $family]);
}
public function destroy($id)
{
    // Cari Family berdasarkan ID
    $family = Family::findOrFail($id);

    // Hapus Family
    $family->delete();

    return response(['message' => 'Family deleted successfully']);
}
}
