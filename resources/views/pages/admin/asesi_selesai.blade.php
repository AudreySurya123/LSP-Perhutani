@extends('layout.app')

@section('content')
<div class="w-full p-1">

    {{-- Card Besar Asesi 2025 --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-4">Data Asesi 2025</h2>

        {{-- Periode --}}
        <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
            <div class="flex items-center gap-2">
                <label class="font-medium text-gray-700">Periode:</label>
                <input type="date" class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <span>-</span>
                <input type="date" class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari Asesi..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel Data Asesi --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Nama / NIK</th>
                        <th class="px-4 py-2 border-b">Perusahaan</th>
                        <th class="px-4 py-2 border-b">Skema</th>
                        <th class="px-4 py-2 border-b">Asesor</th>
                        <th class="px-4 py-2 border-b">TUK</th>
                        <th class="px-4 py-2 border-b">Pendaftaran</th>
                        <th class="px-4 py-2 border-b">Hasil</th>
                        <th class="px-4 py-2 border-b">Dokumen</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
