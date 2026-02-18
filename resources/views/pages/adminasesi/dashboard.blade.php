@extends('layout.app')

@php
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
<div class="p-1">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- ================= FOTO PESERTA ================= --}}
        <div class="md:col-span-1">
            <div class="bg-white rounded-xl shadow-lg border p-6 flex flex-col items-center">
                <img src="{{ asset('images/default.png') }}" class="w-48 h-48 rounded-full object-cover border mb-4"
                    alt="Foto Peserta">

                <h2 class="text-lg font-bold text-gray-800">
                {{ $asesi->name }}
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

                {{-- ================= TAB 1: INFORMASI ASESMEN ================= --}}
                <div x-show="tab === 'info'" x-transition>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                    <div>
                        <p class="text-gray-500">NIK</p>
                        <p class="font-semibold">{{ $asesi->nik ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="font-semibold">{{ $asesi->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Skema Sertifikasi</p>
                        <p class="font-semibold">{{ $asesi->skema_sertifikasi ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Asesor</p>
                        <p class="font-semibold">-</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Validator</p>
                        <p class="font-semibold">-</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Tempat Uji</p>
                        <p class="font-semibold">{{ $asesi->tuk ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Tanggal / Waktu Uji</p>
                        <p class="font-semibold">-</p>
                    </div>

                </div>
            </div>

                {{-- ================= TAB 2: STATUS PEMBAYARAN ================= --}}
                <div x-show="tab === 'bayar'" x-transition>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-2 border text-center w-16">No</th>
                                    <th class="px-3 py-2 border text-left">Tanggal</th>
                                    <th class="px-3 py-2 border text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-3 py-2 border text-center">1</td>
                                    <td class="px-3 py-2 border">-</td>
                                    <td class="px-3 py-2 border">
                                        <span class="px-2 py-1 rounded bg-red-100 text-red-600 text-xs font-semibold">
                                            Belum Bayar
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= PROGRESS ASESMEN ================= --}}
    <div class="mt-6">
        <div class="bg-white rounded-xl shadow-lg border p-6">

            <h3 class="text-lg font-bold text-gray-800 mb-4">
                Progress Asesmen
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2 border text-left w-1/4">Tahapan</th>
                            <th class="px-3 py-2 border text-left">Form</th>
                            <th class="px-3 py-2 border text-left w-1/4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- PRA ASESMEN --}}
                        <tr>
                            <td class="px-3 py-2 border font-semibold align-top">Pra Asesmen</td>
                            <td class="px-3 py-2 border">
                                <ul class="list-disc pl-4 space-y-1">
                                    <li>FR-MAPA-01</li>
                                    <li>FR-MAPA-02</li>
                                    <li>FR.AK-01</li>
                                </ul>
                            </td>
                            <td class="px-3 py-2 border"></td>
                        </tr>

                        {{-- PELAKSANAAN ASESMEN --}}
                        <tr>
                            <td class="px-3 py-2 border font-semibold align-top">Pelaksanaan Asesmen</td>
                            <td class="px-3 py-2 border">
                                <ul class="list-disc pl-4 space-y-1">
                                    <li>FR.IA.11 Meninjau Instrumen</li>
                                    <li>FR.AK.02 Rekaman Asesmen</li>
                                </ul>
                            </td>
                            <td class="px-3 py-2 border"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
