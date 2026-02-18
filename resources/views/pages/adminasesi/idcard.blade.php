@extends('layout.app')

@php
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
    <div class="w-full p-1">
        <div class="bg-white p-6 rounded-xl shadow border border-gray-200 max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-700">
                    Kartu Identitas Asesi
                </h2>
                <a href="{{ route('idcard.download') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                    Unduh Kartu Identitas
                </a>
            </div>

            {{-- ID Card --}}
            <div class="flex justify-center mt-6">
                <div class="border-2 border-black w-[360px] h-[520px] p-4 text-center relative bg-white">

                    {{-- Logo --}}
                    <div class="flex justify-between items-center mb-4">
                        <img src="{{ asset('images/lsp.png') }}" alt="LSP" class="h-8">
                        <img src="{{ asset('images/bnsp.png') }}" alt="BNSP" class="h-8">
                    </div>

                    <h3 class="font-semibold text-sm">
                        Lembaga Sertifikasi Profesi
                    </h3>
                    <p class="text-sm mb-4">Perhutani</p>

                    {{-- Nama --}}
                    <h1 class="text-xl font-bold leading-tight mb-4">
                        {{ $asesi->name }}
                    </h1>

                    {{-- Foto --}}
                    <div class="absolute top-32 right-4 border w-17 h-20 flex items-center justify-center text-xs">
                        @if($asesi->foto)
                            <img src="{{ asset('storage/' . $asesi->foto) }}" class="object-cover w-full h-full">
                        @else
                            Foto Anda
                        @endif
                    </div>

                    {{-- Kompetensi --}}
                    <div class="text-sm mt-4">
                        <p class="font-semibold">Kompetensi:</p>
                        <p>{{ $asesi->skema_sertifikasi ?? '-' }}</p>
                    </div>

                    {{-- Alamat --}}
                    <div class="text-sm mt-3">
                        <p class="font-semibold">Alamat</p>
                        <p>{{ $asesi->alamat ?? '-' }}</p>
                    </div>

                    {{-- Masa Berlaku --}}
                    <div class="text-sm mt-3">
                        <p class="font-semibold">Masa Berlaku :</p>
                    </div>

                    {{-- QR Code --}}
                    <div class="mt-3 flex flex-col items-center">
                        @php
                            $qrValue = route('user.download', $asesi->id);
                        @endphp

                        {!! QrCode::size(90)->generate($qrValue) !!}
                        <p class="text-xs mt-1">{{ $asesi->kode }}</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
