@extends('layout.app')

@section('content')
    <div class="p-1">
        <div class="w-full bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- JUDUL --}}
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Bank Materi Uji Asesmen
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left border">Jenis Materi Uji</th>
                            <th class="px-6 py-4 text-center border w-96">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- ================= OBSERVASI ================= --}}
                        <tr class="border-t">
                            <td class="px-6 py-6 border">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-blue-400 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="search" class="w-10 h-10 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-lg text-gray-700">Soal Observasi</p>
                                        <a href="#" class="text-blue-600 text-sm hover:underline">
                                            Lihat Daftar Materi Uji
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 border">
                                <div class="flex flex-col gap-3 items-start">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i data-lucide="plus" class="w-4 h-4"></i>
                                        Tambah Materi Uji Skenario
                                    </a>
                                    <a href="#"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i data-lucide="plus" class="w-4 h-4"></i>
                                        Tambah Materi Uji Pendukung
                                    </a>
                                </div>
                            </td>
                        </tr>

                        {{-- ================= LISAN ================= --}}
                        <tr class="border-t">
                            <td class="px-6 py-6 border">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-blue-400 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="volume-2" class="w-10 h-10 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-lg text-gray-700">Soal Uji Lisan</p>
                                        <a href="#" class="text-blue-600 text-sm hover:underline">
                                            Lihat Daftar Materi Uji
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 border">
                                <a href="#"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                    Tambah Materi Uji Lisan
                                </a>
                            </td>
                        </tr>

                        {{-- ================= TERTULIS ================= --}}
                        <tr class="border-t">
                            <td class="px-6 py-6 border">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 bg-blue-400 rounded-2xl flex items-center justify-center">
                                        <i data-lucide="file-text" class="w-10 h-10 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-lg text-gray-700">Soal Uji Tulis</p>
                                        <a href="#" class="text-blue-600 text-sm hover:underline">
                                            Lihat Daftar Materi Uji
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 border">
                                <div class="flex flex-col gap-3 items-start">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i data-lucide="plus" class="w-4 h-4"></i>
                                        Tambah Materi Uji Pilihan Ganda
                                    </a>
                                    <a href="#"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i data-lucide="plus" class="w-4 h-4"></i>
                                        Tambah Materi Uji Essai
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
