@extends('layout.app')

@section('content')
<div class="w-full p-1">

    {{-- Card Daftar Asesi Banding --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

        {{-- Header --}}
        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-4">Daftar Asesi Banding</h2>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari asesi banding..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Nama</th>
                        <th class="px-4 py-2 border-b">Detail Banding</th>
                        <th class="px-4 py-2 border-b">Dokumen</th>
                        <th class="px-4 py-2 border-b">Status</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
@endsection
