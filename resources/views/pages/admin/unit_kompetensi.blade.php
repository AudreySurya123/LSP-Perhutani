@extends('layout.app')

@section('content')
    <div class="w-full p-1">

        {{-- Card Data Unit Kompetensi --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">
                    Data Unit Kompetensi Skema {{ $skema->nama_skema ?? '-' }}
                </h2>
                <div class="flex gap-2">
                    {{-- Button Tambah Unit --}}
                    <a href="{{ route('unit.create', $skema->id ?? '#') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                        Tambah Unit
                    </a>

                    {{-- Button Kembali --}}
                    <a href="{{ route('skema.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                        Kembali
                    </a>
                </div>
            </div>

            {{-- Tabel Unit Kompetensi --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b">Kode Unit</th>
                            <th class="px-4 py-2 border-b">Judul Unit</th>
                            <th class="px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skema->units ?? [] as $key => $unit)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $key + 1 }}</td>
                                <td class="px-4 py-2 border-b">{{ $unit->kode_unit }}</td>
                                <td class="px-4 py-2 border-b">{{ $unit->judul_unit }}</td>
                                <td class="px-4 py-2 border-b flex gap-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('unit.edit', [$skema->id, $unit->id]) }}"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs"
                                            onclick="return confirm('Yakin ingin menghapus unit ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                    Belum ada unit kompetensi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
