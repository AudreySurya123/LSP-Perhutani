@extends('layout.app')

@section('content')
<div class="w-full p-1" x-data>

    {{-- Card Log Akses --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

        {{-- Header Judul --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Data Akses Log Peserta (Online)</h2>
        </div>

        {{-- Tombol Aksi Atas --}}
        <div class="flex justify-between items-center mb-4">

            {{-- Kiri --}}
            <button class="bg-red-600 text-white px-3 py-2 text-sm rounded-lg hover:bg-red-700 transition">
                Bersihkan Asesi Online
            </button>

            {{-- Kanan --}}
            <button class="bg-blue-600 text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-700 transition">
                Log Asesor
            </button>

        </div>

        {{-- Maksimal Akses + Update Peserta + Semua Data Log --}}
        <div class="flex justify-between items-center mb-4">

            {{-- Kolom input jumlah maksimal --}}
            <div class="flex items-center gap-3">
                <label class="font-semibold text-gray-700 text-sm">Jumlah Maks Akses :</label>
                <input type="number" class="border rounded-lg p-2 w-24 text-sm" placeholder="0">

                <button class="bg-green-600 text-white px-3 py-2 text-sm rounded-lg hover:bg-green-700 transition">
                    Update Peserta
                </button>
            </div>

            {{-- Button kanan --}}
            <button class="bg-gray-700 text-white px-3 py-2 text-sm rounded-lg hover:bg-gray-800 transition">
                Semua Data Log
            </button>

        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari data..."
                class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">ID</th>
                        <th class="px-4 py-2 border-b">Nama</th>
                        <th class="px-4 py-2 border-b">Login</th>
                        <th class="px-4 py-2 border-b">Akses Terakhir</th>
                        <th class="px-4 py-2 border-b">Logout</th>
                        <th class="px-4 py-2 border-b">Status Login</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

</div>
@endsection
