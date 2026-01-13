@extends('layout.app')

@section('content')
    <div class="w-full p-6 bg-white rounded-xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">Edit Admin</h2>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Lengkap --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $admin->name) }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kata Sandi --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="password">Kata Sandi <small>(isi jika ingin
                        diubah)</small></label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hanya untuk Admin TUK --}}
            @if($admin->admin_level === 'tuk')
@php
    // TUK yang sudah tersimpan di DB
    $selectedTuk = old('tuk')
        ? old('tuk')
        : array_map('trim', explode(',', $admin->tuk ?? ''));
@endphp

<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-2">
        TUK
    </label>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        @foreach($tuks as $tuk)
            <label class="flex items-center gap-2 bg-gray-100 p-2 rounded-lg">
                <input type="checkbox"
                       name="tuk[]"
                       value="{{ $tuk }}"
                       {{ in_array($tuk, $selectedTuk) ? 'checked' : '' }}>
                {{ $tuk }}
            </label>
        @endforeach
    </div>

    @error('tuk')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
@endif



            {{-- Submit --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.index') }}"
                    class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">Batal</a>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
@endsection
