@extends('layout.app')

@php
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
    <div class="w-full p-1">
        <div class="max-w-5xl mx-auto bg-white border rounded-xl shadow p-6">

            {{-- JUDUL --}}
            <h2 class="text-2xl font-bold text-gray-700 mb-6">
                FR.APL.02. Asesmen Mandiri
            </h2>

            {{-- INFO SKEMA --}}
            <div class="mb-6 border rounded-lg overflow-hidden">
                <table class="w-full text-sm border-collapse">
                    {{-- HEADER --}}
                    <tr class="border-b bg-gray-50">
                        <td colspan="3" class="px-4 py-2 font-semibold text-gray-700">
                            Skema Sertifikasi
                        </td>
                    </tr>

                    {{-- JUDUL --}}
                    <tr class="border-b">
                        <td class="w-40 px-4 py-2 text-gray-600">
                            Judul
                        </td>
                        <td class="w-4 px-2 py-2 text-center">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ $asesi->skema_sertifikasi ?? '-' }}
                        </td>
                    </tr>

                    {{-- NOMOR --}}
                    <tr>
                        <td class="px-4 py-2 text-gray-600">
                            Nomor
                        </td>
                        <td class="px-2 py-2 text-center">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ $asesi->nomor_skema ?? '-' }}
                        </td>
                    </tr>
                </table>
            </div>

            {{-- PANDUAN --}}
            <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                <h3 class="font-semibold text-gray-700 mb-2">
                    Panduan Asesmen Mandiri
                </h3>
                <ul class="text-sm text-gray-600 list-disc ml-5 space-y-1">
                    <li>Baca setiap pertanyaan di kolom sebelah kiri</li>
                    <li>Beri tanda centang (✓) jika Anda yakin dapat melakukan tugas</li>
                    <li>Isi bukti pendukung</li>
                    <li class="text-red-600 font-semibold">
                        NB: Bukti berwarna merah berarti belum diklik oleh Asesor
                    </li>
                </ul>
            </div>

            {{-- UNIT KOMPETENSI --}}
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-3 py-2 text-left">
                                Unit Kompetensi 1
                            </th>
                            <th class="border px-3 py-2 text-center w-16">K</th>
                            <th class="border px-3 py-2 text-center w-16">BK</th>
                            <th class="border px-3 py-2 text-center w-32">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Elemen 1 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    1. Elemen: Mempersiapkan pekerjaan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 2 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    2. Elemen: Melakukan persiapan pekerjaan penyadapan di areal kerja
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 3 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    3. Elemen: Mendokumentasikan hasil persiapan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <br>

            {{-- UNIT KOMPETENSI --}}
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-3 py-2 text-left">
                                Unit Kompetensi 2
                            </th>
                            <th class="border px-3 py-2 text-center w-16">K</th>
                            <th class="border px-3 py-2 text-center w-16">BK</th>
                            <th class="border px-3 py-2 text-center w-32">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Elemen 1 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    1. Elemen: Mempersiapkan pekerjaan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 2 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    2. Elemen: Melakukan persiapan pekerjaan penyadapan di areal kerja
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 3 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    3. Elemen: Mendokumentasikan hasil persiapan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <br>

            {{-- UNIT KOMPETENSI --}}
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-3 py-2 text-left">
                                Unit Kompetensi 3
                            </th>
                            <th class="border px-3 py-2 text-center w-16">K</th>
                            <th class="border px-3 py-2 text-center w-16">BK</th>
                            <th class="border px-3 py-2 text-center w-32">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Elemen 1 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    1. Elemen: Mempersiapkan pekerjaan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 2 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    2. Elemen: Melakukan persiapan pekerjaan penyadapan di areal kerja
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 3 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    3. Elemen: Mendokumentasikan hasil persiapan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <br>

            {{-- UNIT KOMPETENSI --}}
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-3 py-2 text-left">
                                Unit Kompetensi 4
                            </th>
                            <th class="border px-3 py-2 text-center w-16">K</th>
                            <th class="border px-3 py-2 text-center w-16">BK</th>
                            <th class="border px-3 py-2 text-center w-32">Bukti</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Elemen 1 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    1. Elemen: Mempersiapkan pekerjaan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 2 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    2. Elemen: Melakukan persiapan pekerjaan penyadapan di areal kerja
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                        {{-- Elemen 3 --}}
                        <tr class="align-top">
                            <td class="border px-3 py-2">
                                <div class="font-semibold">
                                    3. Elemen: Mendokumentasikan hasil persiapan penyadapan
                                </div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Kriteria Unjuk Kerja:
                                    <span class="inline-block ml-2 px-2 py-0.5 text-xs bg-blue-500 text-white rounded">
                                        Lihat
                                    </span>
                                </div>
                            </td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                            <td class="border text-center"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- REKOMENDASI & VERIFIKASI --}}
            <div class="mt-10">
                <h3 class="text-xl font-semibold text-gray-700 mb-3">
                    Rekomendasi dan Verifikasi
                </h3>

                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm border-collapse">
                        {{-- HEADER --}}
                        <tr class="bg-gray-50 border-b">
                            <td class="border px-4 py-2 font-semibold text-gray-600 w-1/2">
                                Rekomendasi Asesor
                            </td>
                            <td class="border px-4 py-2 font-semibold text-gray-600 w-1/2 text-center">
                                Peserta
                            </td>
                        </tr>

                        {{-- NAMA PESERTA --}}
                        <tr>
                            <td class="border px-4 py-3 align-top" rowspan="2">
                                {{-- Kosong sesuai SS --}}
                            </td>
                            <td class="border px-4 py-2">
                                <div class="grid grid-cols-3">
                                    <span class="text-gray-600">Nama</span>
                                    <span class="text-center">:</span>
                                    <span>{{ $asesi->name ?? '-' }}</span>
                                </div>
                            </td>
                        </tr>

                        {{-- TTd PESERTA --}}
                        <tr class="border-b">
                            <td class="border px-4 py-2">
                                <div class="grid grid-cols-3">
                                    <span class="text-gray-600">Tanda Tangan / Tanggal</span>
                                    <span class="text-center">:</span>
                                    <span>&nbsp;</span>
                                </div>
                            </td>
                        </tr>

                        {{-- CATATAN --}}
                        <tr class="bg-gray-50 border-b">
                            <td class="border px-4 py-2 font-semibold text-gray-600">
                                Catatan
                            </td>
                            <td class="border px-4 py-2 font-semibold text-gray-600 text-center">
                                Asesor
                            </td>
                        </tr>

                        {{-- NAMA ASESOR --}}
                        <tr>
                            <td class="border px-4 py-3 align-top" rowspan="3">
                                {{-- Kosong sesuai SS --}}
                            </td>
                            <td class="border px-4 py-2">
                                <div class="grid grid-cols-3">
                                    <span class="text-gray-600">Nama</span>
                                    <span class="text-center">:</span>
                                    <span>&nbsp;</span>
                                </div>
                            </td>
                        </tr>

                        {{-- NO REG --}}
                        <tr>
                            <td class="border px-4 py-2">
                                <div class="grid grid-cols-3">
                                    <span class="text-gray-600">No. Reg</span>
                                    <span class="text-center">:</span>
                                    <span>&nbsp;</span>
                                </div>
                            </td>
                        </tr>

                        {{-- TTD ASESOR --}}
                        <tr>
                            <td class="border px-4 py-2">
                                <div class="grid grid-cols-3">
                                    <span class="text-gray-600">Tanda Tangan / Tanggal</span>
                                    <span class="text-center">:</span>
                                    <span>&nbsp;</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- BUTTON SIMPAN --}}
            <div class="mt-6">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition">
                    Simpan
                </button>
            </div>

        </div>
    </div>
@endsection
