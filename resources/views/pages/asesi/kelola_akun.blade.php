@extends('layout.app')

@section('content')
<div class="p-1">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- ================= CARD UBAH KATA SANDI ================= --}}
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-lg border p-6">
                <h2 class="text-xl font-bold text-[#0D1B5C] mb-6">
                    Ubah Kata Sandi
                </h2>

                <form action="{{ route('akun.ubah_password') }}" method="POST">
                    @csrf
                    {{-- Kata Sandi Lama --}}
                    <div class="mb-4">
                        <label for="old_password" class="block text-sm font-medium text-gray-700 mb-1">
                            Kata Sandi Lama
                        </label>
                        <input type="password" name="old_password" id="old_password"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    {{-- Kata Sandi Baru --}}
                    <div class="mb-4">
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">
                            Kata Sandi Baru
                        </label>
                        <input type="password" name="new_password" id="new_password"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    {{-- Ulangi Kata Sandi --}}
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Ulangi Kata Sandi
                        </label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="text-right">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-semibold">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================= CARD HAPUS AKUN ================= --}}
        <div class="md:col-span-1">
            <div class="bg-white rounded-xl shadow-lg border p-6 flex flex-col justify-between h-full">
                <h2 class="text-xl font-bold text-[#D32F2F] mb-4">
                    Hapus Akun
                </h2>

                <p class="text-sm text-gray-700 mb-6">
                    Menghapus akun akan menghilangkan semua data Anda secara permanen.
                    Pastikan Anda yakin sebelum melanjutkan.
                </p>

                <form action="{{ route('akun.hapus') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg text-sm font-semibold w-full">
                        Hapus Akun
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
