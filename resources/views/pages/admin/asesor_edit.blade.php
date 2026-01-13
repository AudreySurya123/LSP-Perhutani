@extends('layout.app')

@section('content')
<div class="w-full p-1">
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
            Edit Asesor
        </h2>

        <form action="{{ route('asesor.update', $asesor->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-3 gap-6">
            @csrf
            @method('PUT')

            {{-- Form Input Kiri --}}
            <div class="col-span-2 space-y-5">
                {{-- No Registrasi Asesor --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">No Registrasi Asesor</label>
                    <input type="text" name="no_reg_asesor" value="{{ $asesor->no_reg_asesor }}" class="w-full border rounded-lg p-2" required>
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $asesor->name }}" class="w-full border rounded-lg p-2" required>
                </div>

                {{-- NIK --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">NIK</label>
                    <input type="text" name="nik" value="{{ $asesor->nik }}" class="w-full border rounded-lg p-2">
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Alamat</label>
                    <textarea name="alamat" class="w-full border rounded-lg p-2">{{ $asesor->alamat }}</textarea>
                </div>

                {{-- Pendidikan --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Pendidikan</label>
                    <input type="text" name="pendidikan" value="{{ $asesor->pendidikan }}" class="w-full border rounded-lg p-2">
                </div>

                {{-- No HP --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">No HP</label>
                    <input type="text" name="no_hp" value="{{ $asesor->no_hp }}" class="w-full border rounded-lg p-2">
                </div>

                {{-- Masa Aktif Lisensi --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Masa Aktif Lisensi Asesor Sampai</label>
                    <input type="date" name="lisensi_berlaku_sampai" value="{{ $asesor->lisensi_berlaku_sampai?->format('Y-m-d') }}" class="w-full border rounded-lg p-2">
                </div>

                {{-- CV --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">CV</label>
                    @if($asesor->cv)
                        <p class="mb-2">CV Saat Ini: <a href="{{ asset('storage/' . $asesor->cv) }}" target="_blank" class="text-blue-600 hover:underline">Lihat CV</a></p>
                    @endif
                    <input type="file" name="cv" class="w-full border rounded-lg p-2">
                </div>

                {{-- Kata Sandi --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Kata Sandi <span class="text-gray-400">(kosongkan jika tidak ingin diubah)</span></label>
                    <input type="password" name="password" class="w-full border rounded-lg p-2">
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

                @php
                    $kompetensi = [
                        "Penyadapan Getah Pinus",
                        "Persemaian",
                        "Inventarisasi Tegakan Hutan",
                        "Klaster Inventarisasi Tegakan Hutan",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengukuran dan Perpetaan Hutan",
                        "Klaster Pembuatan Tanaman Jati",
                        "Klaster Penjarangan Hutan Jati",
                        "Klaster Tebang Habis Jati",
                        "Klaster Persemaian Vegetatif",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanenan Hutan",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Bulat",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Minyak)",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Getah)",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Lapis",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu (Kelompok Resin)",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemandu Wisata Alam",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pembinaan Hutan",
                        "Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Gergajian"
                    ];
                @endphp

                @foreach($kompetensi as $k)
                    <label class="flex items-center gap-2 bg-gray-100 p-2 rounded">
                        <input type="checkbox" name="bidang_kompetensi[]" value="{{ $k }}"
                        {{ in_array($k, $asesor->bidang_kompetensi ?? []) ? 'checked' : '' }}>
                        {{ $k }}
                    </label>
                @endforeach
            </div>

        </form>
    </div>
</div>
@endsection
