@extends('layout.app')

@section('content')
    <div class="w-full p-1">

        {{-- Card Data Asesor --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Asesor</h2>
                <a href="{{ route('asesor.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Tambah
                </a>
            </div>

            {{-- SEARCH BAR --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari Asesor..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b">Foto</th>
                            <th class="px-4 py-2 border-b">No. Reg / Nama</th>
                            <th class="px-4 py-2 border-b">Bidang Skema</th>
                            <th class="px-4 py-2 border-b">Masa Aktif</th>
                            <th class="px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asesors as $index => $asesor)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border-b">
                                    <div class="w-20 h-20 rounded-full overflow-hidden mx-auto">
                                        @if(isset($asesor->foto) && $asesor->foto != '')
                                            <img src="{{ asset($asesor->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ asset('images/default.png') }}" alt="Foto Default"
                                                class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b">
                                    {{ $asesor->no_reg_asesor }} <br>
                                    <span class="font-bold">{{ $asesor->name }}</span>
                                </td>
                                <td class="px-4 py-2 border-b">
                                    @if($asesor->bidang_kompetensi && count($asesor->bidang_kompetensi) > 0)
                                        <ol class="list-decimal list-inside">
                                            @foreach($asesor->bidang_kompetensi as $bidang)
                                                <li>{{ $bidang }}</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b">
                                    {{ $asesor->lisensi_berlaku_sampai ? $asesor->lisensi_berlaku_sampai->format('d-m-Y') : '-' }}
                                </td>
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('asesor.edit', $asesor->id) }}"
                                        class="text-yellow-400 hover:text-yellow-800 flex items-center gap-1 font-semibold">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-400">
                                    Data asesor belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
