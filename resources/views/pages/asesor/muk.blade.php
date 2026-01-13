@extends('layout.app')

@section('content')
    <div class="p-1">

        {{-- ================= CARD BESAR ================= --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- ================= HEADER ================= --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">
                    Daftar MUK Tervalidasi
                </h2>

                <a href="#"
                    class="mt-4 md:mt-0 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                    Tambah MUK
                </a>
            </div>

            {{-- ================= TAB BAR ================= --}}
            <div class="border-b mb-4">
                <nav class="flex gap-6 text-sm font-semibold text-gray-500">
                    <button class="pb-2 border-b-2 border-blue-600 text-blue-600">
                        MUK Tervalidasi
                    </button>
                    <button class="pb-2 hover:text-blue-600">
                        MUK Belum Validasi
                    </button>
                </nav>
            </div>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari MUK..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- ================= TABEL ================= --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-center text-sm font-semibold w-12">No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Nama MUK</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Skema</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Status</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                        {{-- ================= CONTOH DATA ================= --}}
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-center text-sm">1</td>
                            <td class="px-4 py-3 text-sm">MUK Pemrograman Web</td>
                            <td class="px-4 py-3 text-sm">Junior Web Developer</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700 font-semibold">
                                    Tervalidasi
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="#"
                                    class="inline-flex items-center gap-1 px-3 py-1 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>

                        {{-- ================= DATA KOSONG ================= --}}
                        {{--
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500 text-sm">
                                Data MUK belum tersedia
                            </td>
                        </tr>
                        --}}

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
