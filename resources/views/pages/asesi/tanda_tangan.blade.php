@extends('layout.app')

@section('content')
<div class="p-1">
    <div class="max-w-6xl mx-auto space-y-6">

        {{-- ================= JUDUL ================= --}}
        <div class="bg-white border rounded-xl shadow p-6">
            <h2 class="text-2xl font-bold text-gray-700">
                Rekomendasi dan Verifikasi
            </h2>
        </div>

        {{-- ================= KONTEN UTAMA ================= --}}
        <div class="bg-white border rounded-xl shadow p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- ================= REKOMENDASI ================= --}}
                <div class="border rounded-lg overflow-hidden">
                    <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-700">
                        Rekomendasi
                    </div>

                    <div class="p-4 space-y-3 text-gray-600">
                        <p>
                            Berdasarkan ketentuan persyaratan dasar pemohon, pemohon :
                        </p>
                        <p class="font-semibold">
                            sebagai peserta sertifikasi
                        </p>
                    </div>

                    <div class="border-t px-4 py-3">
                        <label class="block font-semibold text-gray-700 mb-1">
                            Catatan
                        </label>
                        <textarea
                            class="w-full border rounded px-3 py-2"
                            rows="3"
                            placeholder="Catatan tambahan (jika ada)"></textarea>
                    </div>
                </div>

                {{-- ================= DATA PEMOHON & ADMIN ================= --}}
                <div class="border rounded-lg overflow-hidden">

                    {{-- Pemohon --}}
                    <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-700">
                        Pemohon
                    </div>

                    <div class="p-4 space-y-3">
                        <div class="grid grid-cols-3 items-center">
                            <span class="font-semibold">Nama</span>
                            <span class="text-center">:</span>
                            <span>{{ auth()->user()->name ?? '-' }}</span>
                        </div>

                        <div class="grid grid-cols-3 items-center">
                            <span class="font-semibold">Tanda Tangan / Tanggal</span>
                            <span class="text-center">:</span>
                            <span class="text-gray-400 italic">Belum ditandatangani</span>
                        </div>
                    </div>

                    {{-- Admin LSP --}}
                    <div class="bg-gray-100 px-4 py-2 font-semibold text-gray-700 border-t">
                        Admin LSP
                    </div>

                    <div class="p-4 space-y-3">
                        <div class="grid grid-cols-3 items-center">
                            <span class="font-semibold">Nama</span>
                            <span class="text-center">:</span>
                            <span>-</span>
                        </div>

                        <div class="grid grid-cols-3 items-center">
                            <span class="font-semibold">Tanda Tangan / Tanggal</span>
                            <span class="text-center">:</span>
                            <span class="text-gray-400 italic">Menunggu verifikasi</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- ================= BUTTON TANDA TANGAN ================= --}}
        <div class="bg-white border rounded-xl shadow p-4">
            <button
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
                TANDA TANGAN
            </button>
        </div>

    </div>
</div>
@endsection
