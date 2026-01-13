@extends('layout.app')

@section('content')
    <div class="w-full p-1">
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 max-w-6xl mx-auto">

            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Tambah Admin
            </h2>

            <form action="{{ route('admin.store') }}" method="POST" class="grid grid-cols-1 gap-6" x-data="{ level: '' }">
                @csrf

                {{-- LEVEL ADMIN --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Level Admin
                    </label>
                    <select name="admin_level" x-model="level"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="manager">Manager</option>
                        <option value="general">General</option>
                        <option value="tuk">TUK</option>
                    </select>
                </div>

                {{-- KODE ADMIN --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Kode Admin
                    </label>
                    <input type="text" name="kode_admin"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400" required>
                </div>

                {{-- NAMA LENGKAP --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400" required>
                </div>

                {{-- PILIH TUK (KHUSUS ADMIN LEVEL TUK) --}}
                <div x-show="level === 'tuk'" x-transition>
                    <label class="block text-sm font-semibold mb-2 text-red-600">
                        TUK (Wajib Diisi untuk Admin Level TUK)
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <label class="flex items-center gap-2 bg-gray-100 p-2 rounded-lg">
                            <input type="checkbox" name="tuk[]" value="PT Kalimutu Sentosa" :required="level === 'tuk'">
                            PT Kalimutu Sentosa
                        </label>

                        <label class="flex items-center gap-2 bg-gray-100 p-2 rounded-lg">
                            <input type="checkbox" name="tuk[]" value="Wikan">
                            Wikan
                        </label>

                        <label class="flex items-center gap-2 bg-gray-100 p-2 rounded-lg">
                            <input type="checkbox" name="tuk[]" value="Pusdikbang SDM">
                            Pusdikbang SDM
                        </label>

                        <label class="flex items-center gap-2 bg-gray-100 p-2 rounded-lg">
                            <input type="checkbox" name="tuk[]" value="SMK Kehutanan Wali Sembilan">
                            SMK Kehutanan Wali Sembilan
                        </label>
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Kata Sandi
                    </label>
                    <input type="password" name="password"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400" required>
                </div>

                {{-- TOMBOL --}}
                <div class="flex gap-2 pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>

                    <a href="/user/admin" class="bg-gray-300 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
