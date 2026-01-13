@extends('layout.app')

@section('content')
    <div class="p-1">
        <div class="w-full bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- ================= JUDUL ================= --}}
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Daftar Asesi yang Belum Mengupload Sertifikat dan TTD Perjanjian Sertifikat
            </h2>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari asesi..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- ================= TABEL ================= --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-center text-sm font-semibold w-12">No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Sertifikat</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-700">

                        {{-- ================= CONTOH DATA ================= --}}
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">1</td>
                            <td class="px-4 py-3 text-sm">Ahmad Fauzi</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700 font-semibold">
                                    Belum Upload
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="#" class="inline-flex items-center gap-1 px-3 py-1 text-xs rounded-lg
                                          bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="upload" class="w-3 h-3"></i>
                                    Upload
                                </a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">2</td>
                            <td class="px-4 py-3 text-sm">Siti Rahmawati</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700 font-semibold">
                                    Belum Upload
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="#" class="inline-flex items-center gap-1 px-3 py-1 text-xs rounded-lg
                                          bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="upload" class="w-3 h-3"></i>
                                    Upload
                                </a>
                            </td>
                        </tr>

                        {{-- ================= DATA KOSONG ================= --}}
                        {{--
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500 text-sm">
                                Semua asesi sudah mengupload sertifikat
                            </td>
                        </tr>
                        --}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
