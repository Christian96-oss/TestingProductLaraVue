<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        $mst_plant = Plant::select('id', 'plant', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_plant]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'plant' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'


         $mst_plant = Plant::create([
             'plant' => $request->plant,    
             'user_id' => $user_id,         
         ]);
        return response (['data' => $mst_plant]);
    }
    public function update(Request $request, $id)
{
    // Cari Plant berdasarkan ID
    $plant = Plant::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'plant' => 'required|max:255',
    ]);

    // Update data plant
    $plant->update([
        'plant' => $request->plant,  // Update data plant
    ]);

    return response(['data' => $plant]);
}
public function destroy($id)
{
    // Cari Plant berdasarkan ID
    $plant = Plant::findOrFail($id);

    // Hapus Plant
    $plant->delete();

    return response(['message' => 'Plant deleted successfully']);
}

}
