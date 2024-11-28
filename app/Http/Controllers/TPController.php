<?php

namespace App\Http\Controllers;

use App\Models\TestPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class TPController extends Controller
{
    public function index()
    {
        $test_plan = testplan::select('id', 'tp_id', 'requestor', 'family', 'reference', 'lob', 'test_name', 'qty', 'purpose','detail', 'plan_date', 'status')->get();
        return response(['data' => $test_plan]);
    }
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'tp_id' => 'required|max:255',
            'requestor' => 'required|max:255',
            'test_name' => 'required|max:255',
            'lob' => 'required|max:255',
            'family' => 'required|max:255',
            'reference' => 'required|max:255',
            'qty' => 'required|max:255',
            'purpose' => 'required|max:255',
            'plan_date' => 'required|date',
            'detail' => 'required|max:255',
        ]);

        // Menambahkan status default jika tidak ada
        $status = $request->input('status', 'Test Open Wait Approve Lab Engineer'); // Jika status tidak diberikan, set ke default

        // Menyimpan data test plan baru
        $test_plan = Testplan::create([
            'tp_id' => $request->tp_id,
            'requestor' => $request->requestor,
            'test_name' => $request->test_name,
            'lob' => $request->lob,
            'family' => $request->family,
            'reference' => $request->reference,
            'qty' => $request->qty,
            'purpose' => $request->purpose,
            'plan_date' => $request->plan_date,
            'detail' => $request->detail,
            'status' => $status, // Menggunakan nilai status yang diberikan atau default
        ]);

        // Mengembalikan response setelah berhasil disimpan
        return response(['data' => $test_plan]);
    }
    public function update(Request $request, $id)
{
    // Cari TestPlan berdasarkan ID
    $test_plan = TestPlan::findOrFail($id);

    // Validasi data yang masuk
    $request->validate([
        'tp_id' => 'required|max:255',
        'requestor' => 'required|max:255',
        'test_name' => 'required|max:255',
        'lob' => 'required|max:255',
        'family' => 'required|max:255',
        'reference' => 'required|max:255',
        'qty' => 'required|max:255',
        'purpose' => 'required|max:255',
        'plan_date' => 'required|date',
        'detail' => 'required|max:255',
    ]);

    // Update TestPlan
    $test_plan->update($request->all());

    return response(['data' => $test_plan]);
}
public function destroy($id)
{
    // Cari TestPlan berdasarkan ID
    $test_plan = TestPlan::findOrFail($id);

    // Hapus TestPlan
    $test_plan->delete();

    return response(['message' => 'TestPlan deleted successfully']);
}
}
