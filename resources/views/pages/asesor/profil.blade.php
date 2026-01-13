@extends('layout.app')

@section('content')

@php
    $user = auth()->user();
@endphp

    <div class="p-1">
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- Judul --}}
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Profil Asesor
            </h2>

            {{-- Tabs --}}
            <div x-data="{ tab: 'biodata' }">
                <div class="flex border-b mb-6">
                    <button @click="tab = 'biodata'"
                        :class="tab === 'biodata' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                        class="px-4 py-2 font-medium">
                        Biodata
                    </button>
                    <button @click="tab = 'foto'"
                        :class="tab === 'foto' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                        class="px-4 py-2 font-medium">
                        Foto
                    </button>
                </div>

                {{-- ================= TAB BIODATA ================= --}}
                <div x-show="tab === 'biodata'" x-transition>
                    <form class="space-y-4">

                        <div>
                            <label class="label">No Registrasi</label>
                            <input type="text" class="input-form" placeholder="No Registrasi">
                        </div>

                        <div>
                            <label class="label">Nama</label>
                            <input type="text" class="input-form" placeholder="Nama Asesor">
                        </div>

                        <div>
                            <label class="label">NIK</label>
                            <input type="text" class="input-form" placeholder="NIK">
                        </div>

                        <div>
                            <label class="label">Alamat</label>
                            <textarea class="input-form" rows="3" placeholder="Alamat"></textarea>
                        </div>

                        <div>
                            <label class="label">Pendidikan</label>
                            <input type="text" class="input-form" placeholder="Pendidikan Terakhir">
                        </div>

                        <div>
                            <label class="label">No HP</label>
                            <input type="text" class="input-form" placeholder="No HP">
                        </div>

                        <div>
                            <label class="label">CV</label>
                            <input type="file" class="input-form">
                        </div>

                        {{-- Dokumen Asesor --}}
                        <hr class="my-6">

                        <h3 class="font-semibold text-gray-700">
                            Dokumen / Lisensi Asesor
                        </h3>

                        <div class="space-y-3">
                            <input type="text" class="input-form" placeholder="Nama Dokumen / Lisensi">
                            <input type="text" class="input-form" placeholder="No Lisensi">
                            <input type="file" class="input-form">
                        </div>

                        {{-- Tabel Dokumen --}}
                        <div class="overflow-x-auto mt-6">
                            <table class="w-full border text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border px-3 py-2 w-16">No</th>
                                        <th class="border px-3 py-2">Daftar Dokumen</th>
                                        <th class="border px-3 py-2 w-24">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="border px-3 py-2">1</td>
                                        <td class="border px-3 py-2">Sertifikat Asesor</td>
                                        <td class="border px-3 py-2">
                                            <button class="text-red-500 hover:underline">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>

                {{-- ================= TAB FOTO ================= --}}
                <div x-show="tab === 'foto'" x-transition class="flex flex-col items-center">

                    {{-- Wrapper foto --}}
                    <div class="w-40 h-40 rounded-full overflow-hidden border mb-4 bg-gray-100">
                        <img src="{{ asset('images/default.png') }}" alt="Foto Asesor" class="w-full h-full object-cover">
                    </div>
                    <input type="file" class="text-sm">
                </div>

            </div>
        </div>
    </div>

    {{-- Style --}}
    <style>
        .label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 0.25rem;
        }

        .input-form {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
    </style>
@endsection
