@extends('layout.app')

@section('content')
<div class="w-full p-1" x-data="{ tab: 'tatap_muka' }">

    {{-- Card Daftar Agenda Asesmen --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Agenda Asesmen</h2>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Pendaftaran Kegiatan Asesmen
            </button>
        </div>

        {{-- Tabs --}}
        <div class="flex gap-4 mb-4 border-b border-gray-300">
            <button
                @click="tab = 'tatap_muka'"
                :class="tab === 'tatap_muka' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                class="px-4 py-2 focus:outline-none transition">
                Tatap Muka
            </button>
            <button
                @click="tab = 'jarak_jauh'"
                :class="tab === 'jarak_jauh' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                class="px-4 py-2 focus:outline-none transition">
                Jarak Jauh
            </button>
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari Agenda Asesmen..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel berdasarkan tab --}}
        <div class="overflow-x-auto">
            {{-- Tatap Muka --}}
            <table x-show="tab === 'tatap_muka'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Tanggal Asesmen</th>
                        <th class="px-4 py-2 border-b">TUK</th>
                        <th class="px-4 py-2 border-b">Informasi</th>
                        <th class="px-4 py-2 border-b">Tim Asesor</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data --}}
                </tbody>
            </table>

            {{-- Jarak Jauh --}}
            <table x-show="tab === 'jarak_jauh'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Tanggal Asesmen</th>
                        <th class="px-4 py-2 border-b">TUK</th>
                        <th class="px-4 py-2 border-b">Informasi</th>
                        <th class="px-4 py-2 border-b">Tim Asesor</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data --}}
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
