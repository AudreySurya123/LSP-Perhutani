@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="w-full p-1">

    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">
        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">Daftar Calon Asesi</h2>

        {{-- Search Bar --}}
        <div class="mb-4">
            <input type="text" placeholder="Cari calon asesi..."
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-3 py-2 font-semibold text-gray-900">No</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">Nama / NIK</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">Skema</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">Perusahaan</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">Waktu Daftar</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">TUK</th>
                        <th class="px-3 py-2 font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asesi as $key => $a)
                    <tr class="border-b">
                        <td class="px-3 py-2">{{ $key + 1 }}</td>
                        <td class="px-3 py-2">
                            <div class="font-semibold">{{ $a->name }}</div>
                            <div class="text-gray-500 text-xs">{{ $a->nik }}</div>
                        </td>
                        <td class="px-3 py-2">{{ $a->skema_sertifikasi }}</td>
                        <td class="px-3 py-2">{{ $a->perusahaan ?? '-' }}</td>
                        <td class="px-3 py-2">
                            {{ $a->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}
                        </td>
                        <td class="px-3 py-2">{{ $a->tuk ?? '-' }}</td>
                        <td class="px-3 py-2 flex gap-1">

                            <!-- Tombol ACC -->
                            <form action="{{ route('asesi.verifikasi', $a->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-md text-xs">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>

                            <!-- Tombol Tolak -->
                            <form action="{{ route('asesi.tolak', $a->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>

                            <!-- Tombol WhatsApp -->
                            <a href="https://wa.me/{{ $a->no_hp }}" target="_blank"
                                class="p-2 bg-green-600 hover:bg-green-700 text-white rounded-md text-xs">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
