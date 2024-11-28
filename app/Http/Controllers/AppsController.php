<?php

namespace App\Http\Controllers;
use App\Models\Apps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppsController extends Controller
{
    public function index()
    {
        $mst_apps = Apps::select('id', 'apps', 'user_id', 'updated_at')->get();
        return response(['data' => $mst_apps]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'apps' => 'required|max:255',
        ]);
         // Mendapatkan user_id dari pengguna yang sedang login
         $user = Auth::user();  // Mendapatkan user yang sedang login
         $user_id = $user->user_id; // Mengambil nilai 'user_id' dari kolom 'user_id' di tabel 'users'

         $mst_apps = Apps::create([
             'apps' => $request->apps,    
             'user_id' => $user_id,         
         ]);
        return response (['data' => $mst_apps]);
    }
    public function update(Request $request, $id)
{
    // Cari Apps berdasarkan ID
    $apps = Apps::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'apps' => 'required|max:255',
    ]);

    // Update data apps
    $apps->update([
        'apps' => $request->apps,  // Update data apps
    ]);

    return response(['data' => $apps]);
}
public function destroy($id)
{
    // Cari Apps berdasarkan ID
    $apps = Apps::findOrFail($id);

    // Hapus Apps
    $apps->delete();

    return response(['message' => 'Apps deleted successfully']);
}

}
