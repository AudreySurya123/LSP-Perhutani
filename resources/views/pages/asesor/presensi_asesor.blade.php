@extends('layout.app')

@section('content')
    <div class="p-1">

        {{-- ================= CARD BESAR ================= --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- ================= JUDUL ================= --}}
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Presensi Asesmen 2026
            </h2>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- ================= TABEL ================= --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-center text-sm font-semibold w-12">No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">
                                TUK <span class="text-xs text-gray-500">(Bidang Kompetensi)</span>
                            </th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Tim Asesor</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                        {{-- ================= CONTOH DATA ================= --}}
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">1</td>
                            <td class="px-4 py-3 text-sm">12 Januari 2026</td>
                            <td class="px-4 py-3 text-sm">
                                TUK Mandiri <br>
                                <span class="text-xs text-gray-500">Junior Web Developer</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                Ahmad Fauzi<br>
                                Siti Aisyah
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="#"
                                    class="inline-flex items-center gap-1 px-3 py-1 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                                    Presensi
                                </a>
                            </td>
                        </tr>

                        {{-- ================= DATA KOSONG ================= --}}
                        {{--
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500 text-sm">
                                Data presensi asesmen belum tersedia
                            </td>
                        </tr>
                        --}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
