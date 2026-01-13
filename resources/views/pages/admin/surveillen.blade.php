@extends('layout.app')

@section('content')
<div class="w-full p-1" x-data="{ tab: '2025' }">

    {{-- Card --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Surveillen</h2>
        </div>

        {{-- Tabs Tahun --}}
        <div class="flex gap-6 border-b mb-4 text-sm font-semibold">
            @foreach ([2022, 2023, 2024, 2025] as $th)
                <button
                    @click="tab = '{{ $th }}'"
                    :class="tab === '{{ $th }}'
                        ? 'text-blue-600 border-b-2 border-blue-600'
                        : 'text-gray-600'"
                    class="pb-2 px-2 transition">
                    {{ $th }}
                </button>
            @endforeach
        </div>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari data..."
                class="w-full border border-gray-300 rounded-lg p-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">

            {{-- Loop Tahun --}}
            @foreach ([2022, 2023, 2024, 2025] as $th)
            <table x-show="tab === '{{ $th }}'"
                class="w-full border border-gray-200 rounded-lg text-left text-sm">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">NIK</th>
                        <th class="px-4 py-2 border-b">Perusahaan</th>
                        <th class="px-4 py-2 border-b">Tanggal Uji</th>
                        <th class="px-4 py-2 border-b">Sertifikat</th>
                        <th class="px-4 py-2 border-b">Detail</th>
                    </tr>
                </thead>
            </table>
            @endforeach

        </div>

    </div>
</div>
@endsection
