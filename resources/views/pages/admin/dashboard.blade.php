@extends('layout.app')

@section('content')

    {{-- ===== CARD 1: DATA ASESI ===== --}}
    <div class="w-full bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

        {{-- Judul --}}
        <h2 class="text-xl font-bold text-[#0D1B5C] mb-4">
            Data Asesi Uji LSP Perhutani Tahun 2025
        </h2>

        {{-- Card Isi --}}
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 text-center text-sm font-medium">

            <div class="p-4 bg-red-50 border border-red-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-red-700">Belum Terverifikasi</p>
                <h3 class="text-2xl font-bold text-red-700 mt-1">0</h3>
            </div>

            <div class="p-4 bg-green-50 border border-green-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-green-700">Sudah Terverifikasi</p>
                <h3 class="text-2xl font-bold text-green-700 mt-1">0</h3>
            </div>

            <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-yellow-700">Proses Asesmen</p>
                <h3 class="text-2xl font-bold text-yellow-700 mt-1">0</h3>
            </div>

            <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-blue-700">Kompeten</p>
                <h3 class="text-2xl font-bold text-blue-700 mt-1">0</h3>
            </div>

            <div class="p-4 bg-purple-50 border border-purple-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-purple-700">Belum Kompeten</p>
                <h3 class="text-2xl font-bold text-purple-700 mt-1">0</h3>
            </div>

            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-gray-800">Jumlah Asesi</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">0</h3>
            </div>

        </div>
    </div>


    {{-- ===== CARD 2 & 3: TATA MUKA / SJJ & BANDING ===== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- CARD 2: Daftar Tatap Muka / SJJ --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

            <h2 class="text-lg font-bold text-green-700 mb-4">
                Daftar Asesi Tatap Muka / SJJ
            </h2>

            {{-- Tabel Tatap Muka / SJJ --}}
            <table class="w-full text-sm text-left border-collapse mb-4">
                <thead>
                    <tr class="bg-green-100 border-b">
                        <th class="px-3 py-2 font-semibold text-green-900">Tatap Muka</th>
                        <th class="px-3 py-2 font-semibold text-green-900">SJJ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-3 py-2">0</td>
                        <td class="px-3 py-2">0</td>
                    </tr>
                </tbody>
            </table>

            {{-- Jadwal Ujian --}}
            <div class="mt-2 p-3 border rounded-lg bg-green-50 text-green-800 text-sm">
                <strong>Jadwal Ujian:</strong> Belum ada data
            </div>
        </div>


        {{-- CARD 3: Daftar Banding --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">

            <h2 class="text-lg font-bold text-red-700 mb-4">
                Daftar Banding dari Asesi
            </h2>

            {{-- Tabel Banding --}}
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-red-100 border-b">
                        <th class="px-3 py-2 font-semibold text-red-900">No</th>
                        <th class="px-3 py-2 font-semibold text-red-900">Nama</th>
                        <th class="px-3 py-2 font-semibold text-red-900">Perusahaan</th>
                        <th class="px-3 py-2 font-semibold text-red-900">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-3 py-2">-</td>
                        <td class="px-3 py-2">Tidak ada</td>
                        <td class="px-3 py-2">-</td>
                        <td class="px-3 py-2">-</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    {{-- ===== CARD 4: VALIDASI MATERI, ASES, SERTIFIKAT ===== --}}
    <div class="w-full bg-white p-6 rounded-xl shadow-lg border border-gray-200 mt-6">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-center text-sm font-medium">

            {{-- Materi Uji Belum Divalidasi --}}
            <div class="p-4 bg-orange-50 border border-orange-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-orange-700">Materi Uji Belum Divalidasi</p>
                <h3 class="text-2xl font-bold text-orange-700 mt-1">0</h3>
            </div>

            {{-- Asesi Belum Divalidasi --}}
            <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-yellow-700">Asesi Belum Divalidasi</p>
                <h3 class="text-2xl font-bold text-yellow-700 mt-1">0</h3>
            </div>

            {{-- Sertifikat Belum Lengkap --}}
            <div class="p-4 bg-red-50 border border-red-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-red-700">Sertifikat Belum Lengkap</p>
                <h3 class="text-2xl font-bold text-red-700 mt-1">0</h3>
            </div>

            {{-- Sertifikat Lengkap (Selesai) --}}
            <div class="p-4 bg-green-50 border border-green-200 rounded-lg shadow-sm hover:shadow-md transition">
                <p class="text-green-700">Sertifikat Lengkap (Selesai)</p>
                <h3 class="text-2xl font-bold text-green-700 mt-1">0</h3>
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
            <i data-lucide="building" class="text-indigo-600"></i>
            <span>Daftar TUK</span>
        </a>

        <a href="/asesmen/agenda" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="calendar-range" class="text-indigo-600"></i>
            <span>Agenda Asesmen</span>
        </a>

        <a href="/asesmen/laporan" class="p-4 bg-indigo-50 border border-indigo-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="file-text" class="text-indigo-600"></i>
            <span>Laporan Asesmen</span>
        </a>
    </div>

    {{-- Grid Menu Bawah --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm font-medium">
        <a href="/personel-lsp" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="user-check" class="text-teal-600"></i>
            <span>Daftar Personel LSP</span>
        </a>

        <a href="/banding" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="alert-circle" class="text-teal-600"></i>
            <span>Banding</span>
        </a>

        <a href="/pemegang-sertifikat" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="award" class="text-teal-600"></i>
            <span>Pemegang Sertifikat</span>
        </a>

        <a href="/skema" class="p-4 bg-teal-50 border border-teal-200 rounded-lg hover:shadow-md transition flex flex-col items-center justify-center gap-2">
            <i data-lucide="layers" class="text-teal-600"></i>
            <span>Daftar Skema</span>
        </a>
    </div>
</div>

@endsection
