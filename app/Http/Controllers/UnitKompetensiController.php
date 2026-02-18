<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use App\Models\UnitKompetensi;
use Illuminate\Http\Request;

class UnitKompetensiController extends Controller
{
    public function index($skema_id)
    {
        $skema = Skema::with('units')->findOrFail($skema_id);
        $units = $skema->units;

        return view('pages.admin.unit_kompetensi', compact('skema', 'units'));
    }

    public function create($skemaId)
    {
        $skema = Skema::findOrFail($skemaId);

        // ambil semua unit kompetensi
        $units = UnitKompetensi::orderBy('kode_unit')->get();

        return view('pages.admin.tambah_unit', compact('skema', 'units'));
    }

    public function store(Request $request, $skema_id)
    {
        $request->validate([
            'kode_unit' => 'required|string|max:255',
            'judul_unit' => 'required|string|max:255',
            'standar' => 'nullable|string',
        ]);

        UnitKompetensi::create([
            'skema_id' => $skema_id,
            'kode_unit' => $request->kode_unit,
            'judul_unit' => $request->judul_unit,
            'standar' => $request->standar,
        ]);

        return redirect()->route('unit.index', $skema_id)->with('success', 'Unit kompetensi berhasil ditambahkan.');
    }

    public function edit($skema_id, $id)
    {
        $unit = UnitKompetensi::findOrFail($id);
        $skema = Skema::findOrFail($skema_id);

        return view('pages.admin.edit_uk', compact('unit', 'skema'));
    }

    public function update(Request $request, $skema_id, $id)
    {
        $unit = UnitKompetensi::findOrFail($id);

        $request->validate([
            'judul_unit' => 'required|string|max:255',
            'standar' => 'nullable|string',
        ]);

        // Update semua field yang mau diubah
        $unit->update([
            'judul_unit' => $request->judul_unit,
            'standar' => $request->standar,
        ]);

        return redirect()->route('unit.index', $skema_id)
            ->with('success', 'Unit kompetensi berhasil diupdate.');
    }

    public function destroy($skema_id, $id)
    {
        $unit = UnitKompetensi::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit.index', $skema_id)->with('success', 'Unit kompetensi berhasil dihapus.');
    }
}
