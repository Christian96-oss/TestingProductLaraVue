<?php

namespace App\Http\Controllers;
use App\Models\Lob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LobController extends Controller
{
    public function index()
    {
        $mst_lob = Lob::select('id', 'lob', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_lob]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'lob' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'

         // Menyimpan data keluarga dengan user_id dan record_date
         $mst_lob = Lob::create([
             'lob' => $request->lob,    // Data keluarga dari request
             'user_id' => $user_id,            // Menyimpan ID pengguna yang sedang l         // Menyimpan tanggal dan waktu saat ini
         ]);
        return response (['data' => $mst_lob]);
    }
    public function update(Request $request, $id)
{
    // Cari Lob berdasarkan ID
    $lob = Lob::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'lob' => 'required|max:255',
    ]);

    // Update data lob
    $lob->update([
        'lob' => $request->lob,  // Update data lob
    ]);

    return response(['data' => $lob]);
}
public function destroy($id)
{
    // Cari Lob berdasarkan ID
    $lob = Lob::findOrFail($id);

    // Hapus Lob
    $lob->delete();

    return response(['message' => 'Lob deleted successfully']);
}

}
