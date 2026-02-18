@extends('layout.app')

@php
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
    <div class="w-full p-1">
        <div class="max-w-5xl mx-auto bg-white border rounded-xl shadow p-6">

            <h2 class="text-2xl font-bold text-gray-700 mb-6">
                FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI
            </h2>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                    Bagian 1 : Rincian Data Pemohon Sertifikasi
                </h3>
                <p class="text-gray-500 mb-4">
                    Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.
                </p>

                {{-- ================= DATA PRIBADI ================= --}}
                <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                    <h4 class="font-semibold text-gray-700 mb-4">a. Data Pribadi</h4>

                    <div class="space-y-3">

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Nama Lengkap</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->name ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">No. KTP/NIK/Paspor</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->nik ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 gap-3 items-start">
                            <label class="col-span-2 font-semibold">Tempat/Tgl Lahir</label>
                            <span class="col-span-1 text-center mt-2">:</span>

                            <div class="col-span-9 grid grid-cols-2 gap-4">
                                <input type="text" class="w-full border rounded px-2 py-1" placeholder="Tempat Lahir"
                                    value="{{ $asesi->tempat_lahir ?? '' }}">
                                <input type="date" class="w-full border rounded px-2 py-1"
                                    value="{{ $asesi->tanggal_lahir ?? '' }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Jenis Kelamin</label>
                            <span class="col-span-1 text-center">:</span>
                            <select class="col-span-9 border rounded px-2 py-1 w-full">
                                <option value="Laki-Laki" {{ ($asesi->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ ($asesi->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Kebangsaan</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->kebangsaan ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 gap-3 items-start">
                            <label class="col-span-2 font-semibold">Alamat Rumah</label>
                            <span class="col-span-1 text-center mt-2">:</span>

                            <div class="col-span-9 grid grid-cols-2 gap-4">
                                <input type="text" class="w-full border rounded px-2 py-1" placeholder="Alamat"
                                    value="{{ $asesi->alamat ?? '' }}">
                                <select id="provinsi" class="w-full border rounded px-2 py-1">
                                    <option value="">Pilih Provinsi</option>
                                </select>

                                <select id="kabupaten" class="w-full border rounded px-2 py-1 mt-1">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                                <input type="text" class="w-full border rounded px-2 py-1 mt-1" placeholder="Kode Pos"
                                    value="{{ $asesi->kode_pos ?? '' }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-3 items-start">
                            {{-- Label --}}
                            <label class="col-span-2 font-semibold">
                                No. Telepon / E-mail
                            </label>

                            {{-- Titik dua --}}
                            <span class="col-span-1 text-center mt-2">:</span>

                            {{-- Wrapper input (FULL ke kanan) --}}
                            <div class="col-span-9 grid grid-cols-2 gap-4">
                                {{-- Rumah --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">Rumah</label>
                                    <input type="text" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->telp_rumah ?? '' }}">
                                </div>

                                {{-- Kantor --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">Kantor</label>
                                    <input type="text" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->telp_kantor ?? '' }}">
                                </div>

                                {{-- HP --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">HP</label>
                                    <input type="text" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->no_hp ?? '' }}">
                                </div>

                                {{-- Email --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">E-mail</label>
                                    <input type="email" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->email ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Kualifikasi Pendidikan</label>
                            <span class="col-span-1 text-center">:</span>

                            <select name="pendidikan" class="col-span-9 border rounded px-2 py-1 w-full">
                                <option value="">-- Pilih Pendidikan --</option>
                                <option value="SD" {{ ($asesi->pendidikan ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ ($asesi->pendidikan ?? '') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA/Sederajat" {{ ($asesi->pendidikan ?? '') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                                <option value="D1" {{ ($asesi->pendidikan ?? '') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ ($asesi->pendidikan ?? '') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ ($asesi->pendidikan ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ ($asesi->pendidikan ?? '') == 'D4' ? 'selected' : '' }}>D4</option>
                                <option value="S1" {{ ($asesi->pendidikan ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ ($asesi->pendidikan ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ ($asesi->pendidikan ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                        </div>

                    </div>
                </div>

                {{-- ================= DATA PEKERJAAN ================= --}}
                <div class="p-4 border rounded-lg bg-gray-50">
                    <h4 class="font-semibold text-gray-700 mb-4">b. Data Pekerjaan Sekarang</h4>

                    <div class="space-y-3">

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Nama Institusi / Perusahaan</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->perusahaan ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Jabatan</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->jabatan ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 items-center gap-2">
                            <label class="col-span-2 font-semibold">Alamat Kantor</label>
                            <span class="col-span-1 text-center">:</span>
                            <input type="text" class="col-span-9 border rounded px-2 py-1 w-full"
                                value="{{ $asesi->alamat_kantor ?? '' }}">
                        </div>

                        <div class="grid grid-cols-12 gap-3 items-start">
                            {{-- Label (2 baris, SEJAJAR FIELD ATAS) --}}
                            <div class="col-span-2 font-semibold leading-tight">
                                <label class="col-span-2 font-semibold">No. Telp / Fax / E-mail</label>
                            </div>

                            {{-- Titik dua --}}
                            <span class="col-span-1 text-center mt-2">:</span>

                            {{-- Input area --}}
                            <div class="col-span-9 grid grid-cols-2 gap-4">
                                {{-- Telp --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">Telp:</label>
                                    <input type="text" name="telp_kantor" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->telp_kantor ?? '' }}">
                                </div>

                                {{-- Fax --}}
                                <div class="space-y-1">
                                    <label class="text-sm text-gray-600">Fax:</label>
                                    <input type="text" name="fax" class="w-full border rounded px-2 py-1"
                                        value="{{ $asesi->fax ?? '' }}">
                                </div>

                                {{-- Email (full width) --}}
                                <div class="col-span-2 space-y-1">
                                    <label class="text-sm text-gray-600">Email:</label>
                                    <input type="email" name="email_kantor" class="w-full border rounded px-2 py-1"
                                        placeholder="contoh@perusahaan.com" value="{{ $asesi->email_kantor ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    {{-- ================= REKOMENDASI & VERIFIKASI ================= --}}
    <div class="border border-gray-200 rounded-xl overflow-hidden bg-white">

        {{-- Header --}}
        <div class="px-4 py-3 border-b bg-gray-50">
            <h3 class="font-semibold text-gray-700">
                Rekomendasi dan Verifikasi
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">

            {{-- KOLOM KIRI --}}
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-2">
                    Rekomendasi
                </label>

                <p class="text-sm text-gray-500 mb-2">
                    Berdasarkan ketentuan persyaratan dasar pemohon, pemohon :
                </p>

                <select class="w-full border rounded px-3 py-2 mb-3">
                    <option value="">Aktifkan Edit</option>
                    <option value="diterima">Diterima</option>
                    <option value="tidak_diterima">Tidak Diterima</option>
                </select>

                <p class="text-sm text-gray-500 mb-3">
                    sebagai peserta sertifikasi
                </p>

                <label class="block text-sm font-semibold text-gray-600 mb-1">
                    Catatan
                </label>
                <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
               focus:outline-none focus:ring-2 focus:ring-black
               focus:border-black
               resize-none">
    </textarea>
            </div>

            {{-- KOLOM KANAN --}}
            <div class="space-y-4">

                {{-- PEMOHON --}}
                <div>
                    <p class="text-sm font-semibold text-gray-600 mb-2">
                        Pemohon :
                    </p>

                    <div class="border rounded">
                        <div class="flex justify-between px-3 py-2 border-b text-sm">
                            <span class="text-gray-500">Nama</span>
                            <span class="font-medium">{{ $asesi->name ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between px-3 py-2 text-sm">
                            <span class="text-gray-500">Tanda Tangan / Tanggal</span>
                            <span>-</span>
                        </div>
                    </div>
                </div>

                {{-- ADMIN LSP --}}
                <div>
                    <p class="text-sm font-semibold text-gray-600 mb-2">
                        Admin LSP :
                    </p>

                    <div class="border rounded">
                        <div class="flex justify-between px-3 py-2 border-b text-sm">
                            <span class="text-gray-500">Nama</span>
                            <span class="font-medium">{{ Auth::user()->name ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between px-3 py-2 text-sm">
                            <span class="text-gray-500">Tanda Tangan / Tanggal</span>
                            <span>-</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- BUTTON SIMPAN --}}
        <div class="px-4 py-3 border-t bg-gray-50">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                Simpan
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const provinsiSelect = document.getElementById('provinsi');
            const kabupatenSelect = document.getElementById('kabupaten');

            // 🔹 Load Provinsi
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(response => response.json())
                .then(provinces => {
                    provinces.forEach(prov => {
                        const option = document.createElement('option');
                        option.value = prov.id;
                        option.textContent = prov.name;
                        provinsiSelect.appendChild(option);
                    });
                });

            // 🔹 Jika Provinsi dipilih → Load Kabupaten/Kota
            provinsiSelect.addEventListener('change', function () {
                const provinsiId = this.value;
                kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';

                if (!provinsiId) return;

                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        regencies.forEach(kab => {
                            const option = document.createElement('option');
                            option.value = kab.id;
                            option.textContent = kab.name;
                            kabupatenSelect.appendChild(option);
                        });
                    });
            });
        });
    </script>

@endsection
