<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use App\Models\Elemen;
use App\Models\KUK;
use Illuminate\Support\Facades\DB;

class ElemenController extends Controller
{
    public function index($unit_id)
    {
        $unit = UnitKompetensi::with('elemen.kuks')->findOrFail($unit_id);

        return view('pages.admin.elemen.index', [
            'unit' => $unit,
            'elements' => $unit->elemen
        ]);
    }

    public function store(Request $request, $unit_id)
    {
        $request->validate([
            'nama_elemen' => 'required|string'
        ]);

        Elemen::create([
            'unit_id' => $unit_id,
            'nama_elemen' => $request->nama_elemen
        ]);

        return back()->with('success', 'Elemen berhasil ditambahkan');
    }

    public function edit($skema_id, $unit_id)
    {
        $unit = UnitKompetensi::with([
            'elemen.kuks' => function ($q) {
                $q->orderBy('id'); // urutkan KUK berdasarkan id
            }
        ])->findOrFail($unit_id);

        $elements = $unit->elemen->sortBy('id')->map(function ($e) {
            return [
                'id' => $e->id, // simpan id asli Elemen
                'judul' => $e->nama_elemen,
                'kuks' => $e->kuks->map(function ($k) {
                    return [
                        'id' => $k->id, // simpan id asli KUK
                        'kriteria' => $k->kriteria_unjuk_kerja,
                        'bukti' => $k->bukti_bukti,
                    ];
                })->values()->toArray()
            ];
        })->values()->toArray();

        return view('pages.admin.edit_uk', compact('unit', 'skema_id', 'elements'));
    }


    public function update(Request $request, $skema_id, $unit_id)
    {
        $request->validate([
            'elements' => 'required|string'
        ]);

        DB::transaction(function () use ($request, $unit_id) {
            $unit = UnitKompetensi::findOrFail($unit_id);

            $elements = json_decode($request->elements, true);

            // hapus elemen lama beserta KUK
            Elemen::where('unit_id', $unit->id)->delete();

            foreach ($elements as $sort => $el) {
                $elemen = Elemen::create([
                    'unit_id' => $unit->id,
                    'nama_elemen' => $el['judul'],
                    'sort' => $sort
                ]);
                foreach ($el['kuks'] as $kSort => $kuk) {
                    $elemen->kuks()->create([
                        'kriteria_unjuk_kerja' => $kuk['kriteria'],
                        'bukti_bukti' => $kuk['bukti'] ?? null,
                        'sort' => $kSort
                    ]);
                }
            }

        });

        return back()->with('success', 'Elemen & KUK berhasil disimpan');
    }

    public function destroy($elemen_id)
    {
        $elemen = Elemen::findOrFail($elemen_id);
        $elemen->kuks()->delete();
        $elemen->delete();

        return back()->with('success', 'Elemen berhasil dihapus');
    }
}

