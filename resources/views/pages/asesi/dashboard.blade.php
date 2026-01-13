@extends('layout.app')

@section('content')
    <div class="p-1">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- ================= FOTO PESERTA ================= --}}
            <div class="md:col-span-1">
                <div class="bg-white rounded-xl shadow-lg border p-6 flex flex-col items-center">
                    <img src="{{ asset('images/default.png') }}" class="w-48 h-48 rounded-full object-cover border mb-4"
                        alt="Foto Peserta">

                    <h2 class="text-lg font-bold text-gray-800">
                        {{ Auth::user()->name }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        Asesi
                    </p>
                </div>
            </div>

            {{-- ================= DETAIL ASESMEN ================= --}}
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-lg border p-6" x-data="{ tab: 'info' }">

                    {{-- TAB HEADER --}}
                    <div class="flex border-b mb-4">
                        <button @click="tab = 'info'"
                            :class="tab === 'info' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                            class="px-4 py-2 font-semibold text-sm">
                            Informasi Asesmen
                        </button>

                        <button @click="tab = 'bayar'"
                            :class="tab === 'bayar' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                            class="px-4 py-2 font-semibold text-sm">
                            Status Pembayaran
                        </button>
                    </div>

                    {{-- ================= TAB 1 ================= --}}
                    <div x-show="tab === 'info'" x-transition>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                            <div>
                                <p class="text-gray-500">NIK</p>
                                <p class="font-semibold">{{ Auth::user()->nik ?? '-' }}</p>
                            </div>

                            <div>
                                <p class="text-gray-500">Nama</p>
                                <p class="font-semibold">{{ Auth::user()->name }}</p>
                            </div>

                            <div>
                                <p class="text-gray-500">Skema Sertifikasi</p>
                                <p class="font-semibold">
                                    {{ Auth::user()->skema_sertifikasi ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Asesor</p>
                                <p class="font-semibold">-</p>
                            </div>

                            <div>
                                <p class="text-gray-500">Tempat Uji</p>
                                <p class="font-semibold">{{ Auth::user()->tuk }}</p>
                            </div>

                            <div>
                                <p class="text-gray-500">Tanggal / Waktu Uji</p>
                                <p class="font-semibold">-</p>
                            </div>

                            <div class="md:col-span-2">
                                <p class="text-gray-500">Rekomendasi Asesor</p>
                                <p class="font-semibold text-green-600">
                                    -
                                </p>
                            </div>

                        </div>
                    </div>

                    {{-- ================= TAB 2 ================= --}}
                    <div x-show="tab === 'bayar'" x-transition>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-3 py-2 border text-left">Skema</th>
                                        <th class="px-3 py-2 border text-left">Jumlah</th>
                                        <th class="px-3 py-2 border text-left">Status</th>
                                        <th class="px-3 py-2 border text-left">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-3 py-2 border">
                                            {{ Auth::user()->skema_sertifikasi ?? '-' }}
                                        </td>
                                        <td class="px-3 py-2 border">Rp 0</td>
                                        <td class="px-3 py-2 border">
                                            <span class="px-2 py-1 rounded bg-red-100 text-red-600 text-xs">
                                                Belum Bayar
                                            </span>
                                        </td>
                                        <td class="px-3 py-2 border">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 text-right">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-semibold">
                                Bayar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= CARD PROGRESS ASESMEN ================= --}}
        <div class="mt-6">
            <div class="bg-white rounded-xl shadow-lg border p-6">

                {{-- ================= PRA ASESMEN ================= --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">
                        Pra Asesmen
                    </h3>

                    <ul class="list-disc pl-5 text-sm space-y-2">
                        <li class="text-red-600 font-semibold">
                            Form APL 01 – Permohonan Sertifikasi
                        </li>
                        <li class="text-gray-800 font-semibold">
                            Form APL 02 – Asesmen Mandiri
                        </li>
                    </ul>
                </div>

                {{-- ================= PELAKSANAAN ASESMEN ================= --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">
                        Pelaksanaan Asesmen
                    </h3>
                </div>

                {{-- ================= KETERANGAN ================= --}}
                <div class="border-t pt-4">
                    <h3 class="text-md font-bold text-gray-800 mb-2">
                        KETERANGAN :
                    </h3>

                    <p class="text-sm text-gray-700 leading-relaxed">
                        Progress Asesmen menunjukkan form yang telah dilengkapi oleh Asesi
                        selama proses Asesmen.
                        Warna <span class="font-bold text-red-600">MERAH</span> berarti
                        <span class="font-semibold">belum lengkap</span>,
                        sedangkan warna <span class="font-bold text-gray-900">HITAM</span>
                        berarti <span class="font-semibold">telah lengkap</span>.
                    </p>
                </div>

            </div>
        </div>


    </div>
@endsection
