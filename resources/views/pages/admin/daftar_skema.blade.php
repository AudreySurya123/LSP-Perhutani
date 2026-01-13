@extends('layout.app')

@section('content')
<div class="w-full p-1">

    {{-- Card --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Skema</h2>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                Tambah
            </button>
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari skema..."
                class="w-full border border-gray-300 rounded-lg p-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Kode Skema</th>
                        <th class="px-4 py-2 border-b">Nama Skema</th>
                        <th class="px-4 py-2 border-b">Bidang</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

</div>
@endsection
