@extends('layout.app')

@php
    // Ambil data asesi (sama seperti dashboard)
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
<div class="w-full p-1 flex justify-center">
    <div class="bg-white rounded-xl shadow-lg border w-full p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ganti Skema</h2>

        <form action="{{ route('pages.adminasesi.edit_skema') }}" method="POST">
            @csrf

            {{-- Skema Saat Ini --}}
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Skema Saat Ini</label>
                <input type="text" value="{{ $asesi->skema_sertifikasi ?? '-' }}"
                    class="w-full border rounded px-3 py-2 bg-gray-100" disabled>
            </div>

            {{-- Ganti Dengan --}}
            <div class="mb-6">
                <label class="block text-gray-600 mb-1">Ganti Dengan</label>
                <select name="skema_sertifikasi" class="w-full border rounded px-3 py-2">
                    <option value="" selected>Pilih skema sertifikasi</option>
                            <option>Penyadapan Getah Pinus</option>
                            <option>Persemaian</option>
                            <option>Inventarisasi Tegakan Hutan</option>
                            <option>Klaster Inventarisasi Tegakan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengukuran dan Perpetaan Hutan</option>
                            <option>Klaster Pembuatan Tanaman Jati</option>
                            <option>Klaster Penjarangan Hutan Jati</option>
                            <option>Klaster Tebang Habis Jati</option>
                            <option>Klaster Persemaian Vegetatif</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanenan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Bulat</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Minyak Atsiri)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Getah)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemungutan Kayu Lapis</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Resin)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemandu Wisata Alam</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pembinaan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Gergajian</option>
                </select>
            </div>

            {{-- Button Simpan --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                Simpan
            </button>

        </form>
    </div>
</div>

@endsection
