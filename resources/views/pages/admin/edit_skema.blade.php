@extends('layout.app')

@section('content')
<div class="w-full p-1">

    {{-- CARD EDIT SKEMA --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

        {{-- HEADER --}}
        <div class="mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">
                Edit Skema
            </h2>
            <p class="text-sm text-gray-500">
                Perbarui informasi skema sertifikasi
            </p>
        </div>

        {{-- FORM --}}
        <form action="{{ route('skema.update', $skema->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama Skema --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Skema
                </label>
                <input type="text" name="nama_skema"
                    value="{{ old('nama_skema', $skema->nama_skema) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Nomor Skema --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nomor Skema
                </label>
                <input type="text" name="kode_skema"
                    value="{{ old('kode_skema', $skema->kode_skema) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Bidang --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Bidang
                </label>
                <input type="text" name="bidang"
                    value="{{ old('bidang', $skema->bidang) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Jenis --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Jenis Skema
                </label>
                <select name="jenis"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Okupasi" {{ $skema->jenis === 'Okupasi' ? 'selected' : '' }}>
                        Okupasi
                    </option>
                    <option value="Klaster" {{ $skema->jenis === 'Klaster' ? 'selected' : '' }}>
                        Klaster
                    </option>
                </select>
            </div>

            {{-- ACTION BUTTON --}}
            <div class="flex justify-end gap-3 pt-6 border-t">
                <a href="{{ route('skema.index') }}"
                    class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400
                           text-gray-700 font-semibold text-sm">
                    Kembali
                </a>

                <button type="submit"
                    class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700
                           text-white font-semibold text-sm">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
