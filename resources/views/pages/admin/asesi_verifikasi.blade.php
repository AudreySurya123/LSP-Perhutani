@extends('layout.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <div class="w-full p-1">

        {{-- Card Besar Asesi Aktif --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">Data Asesi Aktif</h2>
                <div class="flex gap-2">
                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Aktif</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Nonaktif</button>
                </div>
            </div>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari asesi..."
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Tabel Asesi --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b">Nama / NIK</th>
                            <th class="px-4 py-2 border-b">Skema</th>
                            <th class="px-4 py-2 border-b">Perusahaan</th>
                            <th class="px-4 py-2 border-b">Waktu Daftar</th>
                            <th class="px-4 py-2 border-b">Detail</th>
                            <th class="px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asesis as $key => $a)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $key + 1 }}</td>
                                <td class="px-4 py-2 border-b">
                                    <div class="font-semibold">{{ $a->name }}</div>
                                    <div class="text-gray-500 text-xs">{{ $a->nik ?? '-' }}</div>
                                </td>
                                <td class="px-4 py-2 border-b">{{ $a->skema_sertifikasi ?? '-' }}</td>
                                <td class="px-4 py-2 border-b">{{ $a->perusahaan ?? '-' }}</td>
                                <td class="px-4 py-2 border-b">
                                    {{ $a->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}
                                </td>
                                <td class="px-4 py-2 border-b">Detail</td>
                                <td class="px-4 py-2 border-b">
                                    <div class="flex gap-2">
                                        <!-- Akses -->
                                        <a href="{{ route('admin.akses.asesi', $a->id) }}" target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs">
                                            <i class="fa-solid fa-eye mr-1"></i> Akses
                                        </a>

                                        <!-- WhatsApp -->
                                        <a href="https://wa.me/{{ $a->no_hp ?? '-' }}" target="_blank"
                                            class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md text-xs">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>

                                        <!-- Download Data -->
                                        <a href="{{ route('asesi.download', $a->id) }}"
                                            class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded-md text-xs">
                                            <i class="fa-solid fa-lock"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
