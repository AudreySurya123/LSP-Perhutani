@extends('layout.app')

@section('content')
    <div class="p-1">
        <div class="w-full bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- ================= HEADER ================= --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">
                    Daftar Asesmen
                </h2>

                <div class="flex gap-2 mt-4 md:mt-0">
                    <button
                        class="flex items-center gap-2 px-3 py-1.5 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        <i data-lucide="copy" class="w-4 h-4"></i>
                        Copy
                    </button>
                    <button
                        class="flex items-center gap-2 px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        CSV
                    </button>
                    <button
                        class="flex items-center gap-2 px-3 py-1.5 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i data-lucide="printer" class="w-4 h-4"></i>
                        Print
                    </button>
                </div>
            </div>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari data..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- ================= TABEL ================= --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-center text-sm font-semibold w-12">No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Asesmen</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">TUK</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Bidang Kompetensi</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Tim Asesor</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">File Pendukung</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-700">

                        {{-- ================= CONTOH DATA ================= --}}
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">1</td>
                            <td class="px-4 py-3 text-sm">05-01-2026</td>
                            <td class="px-4 py-3 text-sm">TUK Jakarta</td>
                            <td class="px-4 py-3 text-sm">Teknologi Informasi</td>
                            <td class="px-4 py-3 text-sm">Budi, Siti</td>
                            <td class="px-4 py-3 text-center">
                                <a href="#"
                                    class="inline-flex items-center gap-1 px-3 py-1 text-xs rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="file-text" class="w-3 h-3"></i>
                                    Lihat
                                </a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">2</td>
                            <td class="px-4 py-3 text-sm">06-01-2026</td>
                            <td class="px-4 py-3 text-sm">TUK Bandung</td>
                            <td class="px-4 py-3 text-sm">Jaringan Komputer</td>
                            <td class="px-4 py-3 text-sm">Andi, Rina</td>
                            <td class="px-4 py-3 text-center">
                                <a href="#"
                                    class="inline-flex items-center gap-1 px-3 py-1 text-xs rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="file-text" class="w-3 h-3"></i>
                                    Lihat
                                </a>
                            </td>
                        </tr>

                        {{-- ================= DATA KOSONG ================= --}}
                        {{--
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500 text-sm">
                                Data asesmen belum tersedia
                            </td>
                        </tr>
                        --}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
