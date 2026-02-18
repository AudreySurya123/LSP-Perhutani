<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    // Daftar skema
    public function index()
    {
        $skemas = Skema::all(); // nanti bisa ditambah pagination
        return view('pages.admin.daftar_skema', compact('skemas'));
    }

    // Form tambah skema
    public function create()
    {
        return view('pages.admin.tambah_skema');
    }

    // Simpan skema
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required',
            'bidang'     => 'required',
        ]);

        Skema::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'bidang'     => $request->bidang,
            'jenis'      => $request->jenis,
            'is_active'  => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('skema.index')->with('success', 'Skema berhasil ditambahkan');
    }

    // Form edit skema
    public function edit($id)
    {
        $skema = Skema::findOrFail($id);
        return view('pages.admin.edit_skema', compact('skema'));
    }

    // Update skema
    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);

        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required',
            'bidang'     => 'required',
        ]);

        $skema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'bidang'     => $request->bidang,
            'jenis'      => $request->jenis,
            'is_active'  => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('skema.index')->with('success', 'Skema berhasil diperbarui');
    }

    // Hapus skema
    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Skema berhasil dihapus');
    }
}
