@extends('layout.app')

@section('content')
<div class="w-full p-1">

    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-4">Daftar Asesi Dihapus</h2>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari asesi..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">NIK</th>
                        <th class="px-4 py-2 border-b">Nama Lengkap</th>
                        <th class="px-4 py-2 border-b">Skema</th>
                        <th class="px-4 py-2 border-b">HP</th>
                        <th class="px-4 py-2 border-b">Perusahaan</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asesis as $key => $a)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $key + 1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $a->nik }}</td>
                        <td class="px-4 py-2 border-b">{{ $a->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $a->skema_sertifikasi ?? '-' }}</td>
                        <td class="px-4 py-2 border-b">{{ $a->no_hp ?? '-' }}</td>
                        <td class="px-4 py-2 border-b">{{ $a->perusahaan ?? '-' }}</td>
                        <td class="px-4 py-2 border-b flex gap-2">

                            <!-- Batalkan Hapus -->
                            <form action="{{ route('asesi.batalkan', $a->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                    Batalkan Penolakan
                                </button>
                            </form>

                            <!-- Hapus Permanen -->
                            <form action="{{ route('asesi.hapus-permanen', $a->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs"
                                    onclick="return confirm('Yakin ingin menghapus permanen?')">
                                    Hapus Permanen
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
