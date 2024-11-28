<?php

namespace App\Http\Controllers;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferenceController extends Controller
{
    public function index()
    {
        $mst_reference= Reference::select('id', 'reference', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_reference]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'


         $mst_reference = Reference::create([
             'reference' => $request->reference,    
             'user_id' => $user_id,         
         ]);
        return response (['data' => $mst_reference]);
    }
    public function update(Request $request, $id)
{
    // Cari Reference berdasarkan ID
    $reference = Reference::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'reference' => 'required|max:255',
    ]);

    // Update Reference
    $reference->update([
        'reference' => $request->reference,  // Update data reference
    ]);

    return response(['data' => $reference]);
}
public function destroy($id)
{
    // Cari Reference berdasarkan ID
    $reference = Reference::findOrFail($id);

    // Hapus Reference
    $reference->delete();

    return response(['message' => 'Reference deleted successfully']);
}

}
