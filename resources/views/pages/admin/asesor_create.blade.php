@extends('layout.app')

@section('content')
<div class="w-full p-1">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
            Tambah Asesor
        </h2>

        <form action="{{ route('asesor.store') }}" method="POST" class="grid grid-cols-3 gap-6">
            @csrf

            {{-- Form Input Kiri --}}
            <div class="col-span-2 space-y-5">
                {{-- No Registrasi Asesor --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">No Registrasi Asesor</label>
                    <input type="text" name="no_reg_asesor" class="w-full border rounded-lg p-2" required>
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full border rounded-lg p-2" required>
                </div>

                {{-- Kata Sandi --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Kata Sandi</label>
                    <input type="password" name="password" class="w-full border rounded-lg p-2" required>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3 pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Simpan
                    </button>

                    <a href="{{ route('asesor.index') }}" class="bg-gray-300 px-6 py-2 rounded-lg hover:bg-gray-400">
                        Kembali
                    </a>
                </div>
            </div>

            {{-- Checkbox Bidang Kompetensi Kanan --}}
            <div class="col-span-1 space-y-2 overflow-y-auto max-h-[500px]">
                <label class="block text-sm font-semibold mb-2">Bidang Kompetensi</label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Penyadapan Getah Pinus">
                    Penyadapan Getah Pinus
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Persemaian">
                    Persemaian
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Inventarisasi Tegakan Hutan">
                    Inventarisasi Tegakan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Klaster Inventarisasi Tegakan Hutan">
                    Klaster Inventarisasi Tegakan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengukuran dan Perpetaan Hutan">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengukuran dan Perpetaan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Klaster Pembuatan Tanaman Jati">
                    Klaster Pembuatan Tanaman Jati
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Klaster Penjarangan Hutan Jati">
                    Klaster Penjarangan Hutan Jati
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Klaster Tebang Habis Jati">
                    Klaster Tebang Habis Jati
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Klaster Persemaian Vegetatif">
                    Klaster Persemaian Vegetatif
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanenan Hutan">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanenan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Bulat">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Bulat
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Minyak)">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Minyak)
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Getah)">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Getah)
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Lapis">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Lapis
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Resin)">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Resin)
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemandu Wisata Alam">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemandu Wisata Alam
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pembinaan Hutan">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pembinaan Hutan
                </label>

                <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                    <input type="checkbox" name="bidang_kompetensi[]" value="Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Gergajian">
                    Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Gergajian
                </label>

            </div>

        </form>
    </div>
</div>
@endsection
