@extends('layout.app')

@php
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
    <div class="w-full p-1">
        <div class="max-w-5xl mx-auto bg-white border rounded-xl shadow p-6">

            {{-- JUDUL CARD --}}
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-700">
                    Pemilihan TUK dan Asesor
                </h2>
                <span class="text-sm text-gray-500">
                    Tempat Uji Kompetensi
                </span>
            </div>

            {{-- FIELD PILIH AGENDA ASESMEN --}}
            <div class="mb-6">
                <label for="agenda" class="block text-gray-700 font-semibold mb-2">
                    Pilih Agenda Asesmen
                </label>
                <select id="agenda" name="agenda"
                    class="w-full border rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Pilih Agenda --</option>
                    <option value="agenda1">Agenda 1</option>
                    <option value="agenda2">Agenda 2</option>
                    <option value="agenda3">Agenda 3</option>
                    {{-- Tambahkan opsi sesuai database --}}
                </select>
            </div>

            {{-- BUTTON RESET DAN SIMPAN --}}
            <div class="flex gap-4 mb-4">
                <button type="button"
                    class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 rounded-lg transition">
                    Reset
                </button>
                <button type="button"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                    Simpan
                </button>
            </div>

            {{-- CATATAN --}}
            <p class="text-sm text-red-600 font-semibold">
                NB: Untuk mengganti skema asesmen silahkan reset terlebih dahulu
            </p>

        </div>
    </div>
@endsection
