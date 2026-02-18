@extends('layout.app')

@php
    // Ambil data asesi
    $asesi = session('akses_asesi_id')
        ? \App\Models\User::find(session('akses_asesi_id'))
        : Auth::user();
@endphp

@section('content')
<div class="w-full p-1 flex justify-center">
    <div class="bg-white rounded-xl shadow-lg border w-full p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-8">
            Ganti Metode Pembayaran
        </h2>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Metode Pembayaran Saat Ini (dari ASESI) --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Metode Pembayaran
                </label>
                <input type="text"
                    value="{{ $asesi->pilihan_pembayaran ?? '-' }}"
                    class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700"
                    disabled>
            </div>

            {{-- Ganti Metode Pembayaran --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Ganti Pembayaran
                </label>
                <select name="pilihan_pembayaran"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Metode --</option>
                    <option value="Sumber Anggaran Biaya Mandiri">Sumber Anggaran Biaya Mandiri</option>
                    <option value="Sumber Anggaran Biaya dari Pemerintah">Sumber Anggaran Biaya dari Pemerintah</option>
                    <option value="Sumber Anggaran Biaya dari APBD">Sumber Anggaran Biaya dari APBD</option>
                    <option value="Sumber Anggaran Biaya dari APBN">Sumber Anggaran Biaya dari APBN</option>
                </select>
            </div>

            {{-- Jumlah --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Jumlah (Rp)
                </label>
                <input type="number"
                    name="jumlah"
                    placeholder="Contoh: 1500000"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Sumber Pembayaran --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Sumber Pembayaran
                </label>
                <select name="sumber"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Sumber --</option>
                    <option value="Cash">Cash</option>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                </select>
            </div>

            {{-- Bukti Pembayaran --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Bukti Pembayaran
                </label>
                <input type="file"
                    name="bukti_pembayaran"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            {{-- Status --}}
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Status
                </label>
                <select name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    <option value="belum lunas">Belum Lunas</option>
                    <option value="lunas">Lunas</option>
                </select>
            </div>

            {{-- Button Simpan --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition-all">
                Simpan
            </button>

        </form>

    </div>
</div>
@endsection
