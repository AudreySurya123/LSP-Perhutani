@extends('layout.app')

@section('content')
<div class="w-full p-1" x-data="{ tab: 'mandiri' }">

    {{-- Card Daftar TUK --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar TUK</h2>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Tambah</button>
        </div>

        {{-- Tabs --}}
        <div class="flex gap-4 mb-4 border-b border-gray-300">
            <button
                @click="tab = 'mandiri'"
                :class="tab === 'mandiri' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                class="px-4 py-2 focus:outline-none transition">
                TUK Mandiri
            </button>
            <button
                @click="tab = 'sewaktu'"
                :class="tab === 'sewaktu' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                class="px-4 py-2 focus:outline-none transition">
                TUK Sewaktu
            </button>
            <button
                @click="tab = 'sjj'"
                :class="tab === 'sjj' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-700'"
                class="px-4 py-2 focus:outline-none transition">
                TUK SJJ
            </button>
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari TUK..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel berdasarkan tab --}}
        <div class="overflow-x-auto">
            {{-- TUK Mandiri --}}
            <table x-show="tab === 'mandiri'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Tempat Uji Kompetensi</th>
                        <th class="px-4 py-2 border-b">Dokumen TUK</th>
                        <th class="px-4 py-2 border-b">Verifikasi</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data --}}
                </tbody>
            </table>

            {{-- TUK Sewaktu --}}
            <table x-show="tab === 'sewaktu'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Tempat Uji Kompetensi</th>
                        <th class="px-4 py-2 border-b">Dokumen TUK</th>
                        <th class="px-4 py-2 border-b">Verifikasi</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data --}}
                </tbody>
            </table>

            {{-- TUK SJJ --}}
            <table x-show="tab === 'sjj'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Tempat Uji Kompetensi</th>
                        <th class="px-4 py-2 border-b">Dokumen TUK</th>
                        <th class="px-4 py-2 border-b">Verifikasi</th>
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
