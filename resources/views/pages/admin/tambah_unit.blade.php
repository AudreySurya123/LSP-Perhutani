@extends('layout.app')

@section('content')
    <div class="w-full p-1">

        {{-- Card Tambah Unit Kompetensi --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#0D1B5C]">
                    Tambah Unit Kompetensi Baru untuk Skema {{ $skema->nama_skema ?? '-' }}
                </h2>
                <a href="{{ route('unit.index', $skema->id ?? '#') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                    Kembali
                </a>
            </div>

            {{-- Tabs --}}
            <div x-data="{ tab: 'pilih' }">
                <div class="flex gap-4 mb-4 border-b border-gray-200">
                    <button @click="tab='pilih'"
                        :class="tab==='pilih' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-500'"
                        class="px-4 py-2">
                        Pilih Unit Kompetensi
                    </button>
                    <button @click="tab='baru'"
                        :class="tab==='baru' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-500'"
                        class="px-4 py-2">
                        Buat UK Baru
                    </button>
                </div>

                {{-- Tab Pilih Unit --}}
                <div x-show="tab==='pilih'" class="space-y-4">
                    <p class="font-semibold">Pilih Unit Kompetensi dibawah ini:</p>
                    <form action="#" method="POST"> {{-- masih dummy, belum ada route --}}
                        @csrf
                        <div>
                            <select name="unit_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Unit Kompetensi --</option>

                                @forelse ($units as $unit)
                                    <option value="{{ $unit->id }}">
                                        {{ $unit->kode_unit }}. {{ $unit->judul_unit }}
                                    </option>
                                @empty
                                    <option disabled>Belum ada unit kompetensi</option>
                                @endforelse
                            </select>

                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition font-semibold">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Tab Buat UK Baru --}}
                <div x-show="tab==='baru'" class="space-y-4">
                    <form action="{{ route('unit.store', $skema->id) }}" method="POST">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold mb-1">Kode Unit</label>
                            <input type="text" name="kode_unit"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Judul Unit</label>
                            <input type="text" name="judul_unit"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Standar</label>
                            <textarea name="standar"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition font-semibold">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
