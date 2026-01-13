@extends('layout.app')

@section('content')
<div class="w-full p-1">
    <div class="max-w-6xl mx-auto bg-white border rounded-xl shadow p-4">

        {{-- Header --}}
        <div class="grid grid-cols-12 gap-4 items-center border-b pb-4 mb-4">
            {{-- Logo --}}
            <div class="col-span-2">
                <img src="{{ asset('images/lsp.png') }}" alt="LSP Perhutani" class="h-16">
            </div>

            {{-- Judul --}}
            <div class="col-span-8 text-center">
                <h2 class="font-bold text-gray-700 text-lg">
                    LEMBAGA SERTIFIKASI PROFESI
                </h2>
                <h2 class="font-bold text-gray-700 text-lg">
                    PERHUTANI
                </h2>
                <p class="font-semibold mt-2">
                    DAFTAR HADIR ASESMEN <br>
                    SERTIFIKASI PESERTA UJI KOMPETENSI
                </p>
            </div>

            {{-- Info Hari/Tanggal/Pukul/TUK --}}
            <div class="col-span-2 text-sm">
                <table class="w-full">
                    <tr>
                        <td>Hari/Tanggal</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Pukul</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>TUK</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Tabel Peserta --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr class="text-center">
                        <th class="border border-gray-300 p-2">Nama Peserta</th>
                        <th class="border border-gray-300 p-2">Nama Asesor</th>
                        <th class="border border-gray-300 p-2">Skema</th>
                        <th class="border border-gray-300 p-2">Tanda Tangan Asesi</th>
                        <th class="border border-gray-300 p-2">Tanda Tangan Asesor</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Dummy Row 1 --}}
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2 text-left">John Doe</td>
                        <td class="border border-gray-300 p-2">Jane Smith</td>
                        <td class="border border-gray-300 p-2 text-left">Skema A</td>
                        <td class="border border-gray-300 p-2">TTD Asesi</td>
                        <td class="border border-gray-300 p-2">TTD Asesor</td>
                    </tr>
                    {{-- Dummy Row 2 --}}
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2 text-left">Alice Johnson</td>
                        <td class="border border-gray-300 p-2">Bob Martin</td>
                        <td class="border border-gray-300 p-2 text-left">Skema B</td>
                        <td class="border border-gray-300 p-2">TTD Asesi</td>
                        <td class="border border-gray-300 p-2">TTD Asesor</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
