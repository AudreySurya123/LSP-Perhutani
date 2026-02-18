@extends('layout.app')

@section('content')
<div class="w-full p-1">

    {{-- Card Tambah Skema --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Tambah Skema</h2>
        </div>

        {{-- Form --}}
        <form action="{{ route('skema.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama Skema --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Skema</label>
                <input type="text" name="nama_skema" placeholder="Masukkan nama skema"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('nama_skema') }}">
                @error('nama_skema')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nomor Skema --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Skema</label>
                <input type="text" name="kode_skema" placeholder="Masukkan nomor skema"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('kode_skema') }}">
                @error('kode_skema')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bidang --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Bidang</label>
                <input type="text" name="bidang" placeholder="Masukkan bidang skema"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('bidang') }}">
                @error('bidang')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Footer --}}
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('skema.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-semibold">
                   Kembali
                </a>
                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition font-semibold">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
