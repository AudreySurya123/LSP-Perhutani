@extends('layout.app')

@section('content')
<div class="w-full p-1" x-data="{ tab: 'validator' }">

    {{-- Card Daftar Validator / Verifikator --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Validator & Verifikator</h2>

            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Tambah
            </button>
        </div>

        {{-- Tabs --}}
        <div class="flex gap-6 border-b mb-4 text-sm font-semibold">
            <button
                @click="tab = 'validator'"
                :class="tab === 'validator' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600'"
                class="pb-2 px-2 transition">
                Validator
            </button>
            <button
                @click="tab = 'verifikator'"
                :class="tab === 'verifikator' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600'"
                class="pb-2 px-2 transition">
                Verifikator
            </button>
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari data..."
                class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">

            {{-- Tabel Validator --}}
            <table x-show="tab === 'validator'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Kode</th>
                        <th class="px-4 py-2 border-b">Nama Lengkap (No WA)</th>
                        <th class="px-4 py-2 border-b">Skema</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
            </table>

            {{-- Tabel Verifikator --}}
            <table x-show="tab === 'verifikator'" class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Kode</th>
                        <th class="px-4 py-2 border-b">Nama Lengkap (No WA)</th>
                        <th class="px-4 py-2 border-b">Skema</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
            </table>

        </div>

    </div>
</div>
@endsection
