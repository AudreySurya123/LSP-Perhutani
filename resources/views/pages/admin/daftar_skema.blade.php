@extends('layout.app')

@section('content')
    <div class="w-full p-1">

        {{-- CARD DAFTAR SKEMA --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">Daftar Skema</h2>

                <a href="{{ route('skema.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                    Tambah
                </a>
            </div>

            {{-- SEARCH --}}
            <div class="mb-4">
                <input type="text" placeholder="Cari skema..." class="w-full border border-gray-300 rounded-lg p-2 text-sm
                                                    focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- TABEL SKEMA --}}
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg text-left text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b">Nama Skema</th>
                            <th class="px-4 py-2 border-b">Kode Skema</th>
                            <th class="px-4 py-2 border-b">Bidang</th>
                            <th class="px-4 py-2 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skemas as $key => $skema)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $key + 1 }}</td>
                                <td class="px-4 py-2 border-b">{{ $skema->nama_skema }}</td>
                                <td class="px-4 py-2 border-b">{{ $skema->kode_skema }}</td>
                                <td class="px-4 py-2 border-b">{{ $skema->bidang }}</td>
                                <td class="px-4 py-2 border-b">
                                    <div class="flex gap-2">
                                        <button onclick="openModal('modal-{{ $skema->id }}')"
                                            class="px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white rounded text-xs">
                                            Lihat Detail
                                        </button>
                                        <a href="{{ route('skema.edit', $skema->id) }}"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs">
                                            Sembunyikan
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                    Belum ada skema
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ================= MODAL DETAIL SKEMA ================= --}}
    @foreach($skemas as $skema)
        <div id="modal-{{ $skema->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl mx-4 flex flex-col max-h-[80vh]">

                {{-- HEADER MODAL --}}
                <div class="flex justify-between items-center px-6 py-4 border-b flex-shrink-0">
                    <h3 class="text-lg font-semibold text-gray-800">Unit Kompetensi</h3>
                    <button onclick="closeModal('modal-{{ $skema->id }}')"
                        class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
                </div>

                {{-- BODY MODAL --}}
                <div class="relative px-6 py-4 space-y-4 text-sm text-gray-700 overflow-y-auto flex-1">
                    {{-- Tombol Edit Skema --}}
                    <a href="{{ route('skema.edit', $skema->id) }}" class="absolute top-4 right-6 px-3 py-1.5
                               bg-blue-600 hover:bg-blue-700 text-white
                               rounded-lg text-sm font-semibold">
                        Edit Skema
                    </a>

                    {{-- INFO SKEMA --}}
                    <div class="grid grid-cols-3 gap-2">
                        <div class="font-medium">Skema</div>
                        <div class="col-span-2">: {{ $skema->nama_skema }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="font-medium">Nomor</div>
                        <div class="col-span-2">: {{ $skema->kode_skema }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="font-medium">Bidang</div>
                        <div class="col-span-2">: {{ $skema->bidang }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="font-medium">Jenis</div>
                        <div class="col-span-2">: {{ $skema->jenis }}</div>
                    </div>

                    <hr>

                    {{-- UNIT KOMPETENSI --}}
                    <div class="space-y-3">
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-200 rounded-lg text-sm">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 border-b">Unit Kompetensi</th>
                                        <th class="px-4 py-2 border-b w-24 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($skema->units as $unit)
                                        <tr>
                                            <td class="px-4 py-3 border-b">
                                                <div class="flex flex-col">
                                                    <span class="text-xs text-gray-500 font-medium">
                                                        {{ $unit->kode_unit }}
                                                    </span>
                                                    <span class="text-sm font-semibold text-gray-800">
                                                        {{ $unit->judul_unit }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 border-b text-center">
                                                <a href="{{ route('unit.edit', [$skema->id, $unit->id]) }}"
                                                    class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-3 text-center italic text-gray-500">
                                                Belum ada unit kompetensi
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mb-4">
                            <a href="{{ route('unit.index', $skema->id) }}"
                                class="w-full inline-block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-semibold">
                                Tambah / Hapus Unit Kompetensi
                            </a>
                        </div>
                    </div>
                </div>

                {{-- FOOTER MODAL --}}
                <div class="flex justify-end px-6 py-4 border-t bg-gray-50 rounded-b-xl flex-shrink-0">
                    <button onclick="closeModal('modal-{{ $skema->id }}')"
                        class="px-4 py-2 text-sm bg-gray-300 hover:bg-gray-400 rounded-lg">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    @endforeach

    {{-- SCRIPT MODAL --}}
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
