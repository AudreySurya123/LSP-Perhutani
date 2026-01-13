@extends('layout.app')

@section('content')
    <div class="p-1">

        {{-- ================= CARD BESAR 1 ================= --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 mb-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- JUMLAH ASESI --}}
                <div class="flex items-center gap-4 p-6 rounded-xl bg-blue-50 border border-blue-200">
                    <div class="p-4 bg-blue-600 text-white rounded-full">
                        <i data-lucide="users"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Jumlah Asesi</p>
                        <p class="text-3xl font-bold text-blue-700">
                            {{ $totalAsesi ?? 0 }}
                        </p>
                    </div>
                </div>

                {{-- KOMPETEN --}}
                <div class="flex items-center gap-4 p-6 rounded-xl bg-green-50 border border-green-200">
                    <div class="p-4 bg-green-600 text-white rounded-full">
                        <i data-lucide="check-circle"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Kompeten</p>
                        <p class="text-3xl font-bold text-green-700">
                            {{ $kompeten ?? 0 }}
                        </p>
                    </div>
                </div>

                {{-- BELUM KOMPETEN --}}
                <div class="flex items-center gap-4 p-6 rounded-xl bg-red-50 border border-red-200">
                    <div class="p-4 bg-red-600 text-white rounded-full">
                        <i data-lucide="x-circle"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Belum Kompeten</p>
                        <p class="text-3xl font-bold text-red-700">
                            {{ $belumKompeten ?? 0 }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ================= CARD INFORMASI ASES I ================= --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">

            <div class="text-center space-y-2">
                <p class="text-lg text-gray-600">
                    Jumlah Seluruh Asesi adalah =
                    <span class="font-semibold text-blue-700">
                        {{ $totalSeluruhAsesi ?? 0 }} Asesi
                    </span>
                </p>

                <p class="text-lg text-gray-600">
                    Asesi Selesai yang belum Mengupload Sertifikat =
                    <span class="font-semibold text-red-600">
                        {{ $belumUploadSertifikat ?? 0 }} Asesi
                    </span>
                </p>
            </div>

        </div>

        {{-- ================= CARD BANK SOAL ================= --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-8">

            <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x">

                {{-- BANK SOAL OBSERVASI --}}
                <div class="text-center px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Bank Soal Observasi
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        (Diajukan | Diterima | Ditolak)
                    </p>
                    <p class="text-3xl font-bold text-gray-700 mt-4">
                        {{ $observasi_diajukan ?? 0 }}
                        |
                        {{ $observasi_diterima ?? 0 }}
                        |
                        {{ $observasi_ditolak ?? 0 }}
                    </p>
                </div>

                {{-- BANK SOAL LISAN --}}
                <div class="text-center px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Bank Soal Lisan
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        (Diajukan | Diterima | Ditolak)
                    </p>
                    <p class="text-3xl font-bold text-gray-700 mt-4">
                        {{ $lisan_diajukan ?? 0 }}
                        |
                        {{ $lisan_diterima ?? 0 }}
                        |
                        {{ $lisan_ditolak ?? 0 }}
                    </p>
                </div>

                {{-- BANK SOAL TULIS --}}
                <div class="text-center px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Bank Soal Tulis
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        (Diajukan | Diterima | Ditolak)
                    </p>
                    <p class="text-3xl font-bold text-gray-700 mt-4">
                        {{ $tulis_diajukan ?? 0 }}
                        |
                        {{ $tulis_diterima ?? 0 }}
                        |
                        {{ $tulis_ditolak ?? 0 }}
                    </p>
                </div>

            </div>
        </div>

{{-- ===== CARD 5: MENU DASHBOARD ===== --}}
<div class="w-full bg-white p-6 rounded-xl shadow-lg border border-gray-200 mt-6">

    {{-- Judul --}}
    <h2 class="text-lg font-bold text-[#0D1B5C] mb-4">
        Menu Dashboard
    </h2>

    {{-- Grid Menu Atas --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm font-medium mb-4">
        <a href="/asesmen/presensi" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="fingerprint" class="text-indigo-600"></i>
            <span>Presensi</span>
        </a>

        <a href="/asesmen/daftar-tuk" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="file-check" class="text-indigo-600"></i>
            <span>MUK Master</span>
        </a>

        <a href="/asesmen/agenda" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="database" class="text-indigo-600"></i>
            <span>Bank Materi Uji</span>
        </a>

        <a href="/asesmen/laporan" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="file-text" class="text-indigo-600"></i>
            <span>Laporan Asesmen</span>
        </a>
    </div>

    {{-- Grid Menu Bawah --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm font-medium">
        <a href="/personel-lsp" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="award" class="text-teal-600"></i>
            <span>Pemegang Sertifikat</span>
        </a>

        <a href="/banding" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="alert-circle" class="text-teal-600"></i>
            <span>Banding</span>
        </a>

        <a href="/pemegang-sertifikat" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="user" class="text-teal-600"></i>
            <span>Profil</span>
        </a>

        <a href="/skema" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="help-circle" class="text-teal-600"></i>
            <span>Bantuan</span>
        </a>
    </div>
</div>

    </div>
@endsection
