@extends('layout.app')

@section('content')
    <div class="p-1">
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            {{-- Judul --}}
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">
                Ubah Kata Sandi
            </h2>

            <form method="POST" action="#">
                @csrf

                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Kata Sandi Lama
                        </label>
                        <input type="password" placeholder="Masukkan kata sandi lama"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Kata Sandi Baru
                        </label>
                        <input type="password" placeholder="Masukkan kata sandi baru"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                            Ulangi Kata Sandi Baru
                        </label>
                        <input type="password" placeholder="Ulangi kata sandi baru"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="reset" class="px-6 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                            Hapus
                        </button>

                        <button type="submit"
                            class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
