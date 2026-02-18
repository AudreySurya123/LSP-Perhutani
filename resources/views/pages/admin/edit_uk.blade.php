@extends('layout.app')

@section('content')
<div class="w-full p-1">

    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-[#0D1B5C]">
                Edit Unit Kompetensi {{ $unit->kode_unit ?? '-' }}
            </h2>
            <a href="{{ route('unit.index', $skema->id) }}"
                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg text-sm font-semibold">
                Kembali
            </a>
        </div>

        {{-- FORM UNIT KOMPETENSI --}}
        <form action="{{ route('unit.update', [$skema->id, $unit->id]) }}" method="POST" class="space-y-4 mb-8">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Unit</label>
                <input type="text" name="judul_unit" value="{{ $unit->judul_unit }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Standar</label>
                <textarea name="standar" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ $unit->standar }}</textarea>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                    Simpan
                </button>
            </div>
        </form>

        {{-- FORM ELEMEN + KUK --}}
        <form action="{{ route('elemen.update', [$skema->id, $unit->id]) }}" method="POST"
              x-data="unitElements()" class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <h3 class="text-lg font-semibold mb-2">Elemen Kompetensi</h3>
                <p class="text-sm text-gray-500 mb-4">Tambah / ubah elemen dan KUK</p>

                {{-- TAB --}}
                <div class="flex gap-2 border-b mb-4">
                    <template x-for="(elemen, index) in elements" :key="index">
                        <button type="button"
                                @click="active = index"
                                class="px-4 py-2"
                                :class="active === index
                                    ? 'border-b-2 border-blue-600 text-blue-600 font-semibold'
                                    : 'text-gray-500'">
                            <span x-text="elemen.judul"></span>
                        </button>
                    </template>
                </div>

                {{-- BUTTON TAMBAH / HAPUS --}}
                <div class="flex gap-2 mb-4">
                    <button type="button" @click="addElement()"
                        class="px-3 py-1.5 bg-blue-600 text-white rounded text-sm">
                        + Elemen
                    </button>
                    <button type="button" @click="removeElement(active)"
                        class="px-3 py-1.5 bg-red-600 text-white rounded text-sm">
                        Hapus Elemen
                    </button>
                </div>

                {{-- CONTENT --}}
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <template x-for="(elemen, index) in elements" :key="index">
                        <div x-show="active === index" class="space-y-4">

                            {{-- JUDUL ELEMEN --}}
                            <div>
                                <label class="block text-sm font-semibold mb-1">Judul Elemen</label>
                                <input type="text" x-model="elemen.judul"
                                       class="w-full border rounded px-3 py-2">
                            </div>

                            {{-- TABEL KUK --}}
                            <table class="w-full border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border px-2 py-2 text-left">Kriteria Unjuk Kerja</th>
                                        <th class="border px-2 py-2 text-left">Bukti</th>
                                        <th class="border px-2 py-2 w-20">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(kuk, kIndex) in elemen.kuks" :key="kIndex">
                                        <tr>
                                            <td class="border px-2 py-2">
                                                <textarea x-model="kuk.kriteria"
                                                          class="w-full border rounded px-2 py-1"></textarea>
                                            </td>
                                            <td class="border px-2 py-2">
                                                <textarea x-model="kuk.bukti"
                                                          class="w-full border rounded px-2 py-1"></textarea>
                                            </td>
                                            <td class="border px-2 py-2 text-center">
                                                <button type="button"
                                                        @click="removeKUK(index, kIndex)"
                                                        class="px-2 py-1 bg-red-600 text-white rounded text-sm">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>

                            <button type="button" @click="addKUK(index)"
                                    class="px-3 py-1 bg-green-600 text-white rounded text-sm">
                                + KUK
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            {{-- HIDDEN INPUT JSON --}}
            <input type="hidden" name="elements" :value="JSON.stringify(elements)">

            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                    Simpan Elemen & KUK
                </button>
            </div>
        </form>

    </div>
</div>

{{-- ALPINEJS --}}
<script src="//unpkg.com/alpinejs" defer></script>
<script>
function unitElements() {
    return {
        active: 0,
        elements: @json($elements ?? []),

        addElement() {
            this.elements.push({ judul: 'Elemen Baru', kuks: [] });
            this.active = this.elements.length - 1;
        },

        removeElement(index) {
            if (this.elements.length === 0) return;
            this.elements.splice(index, 1);
            if (this.active >= this.elements.length) this.active = this.elements.length - 1;
        },

        addKUK(index) {
            this.elements[index].kuks.push({ kriteria: '', bukti: '' });
        },

        removeKUK(eIndex, kIndex) {
            this.elements[eIndex].kuks.splice(kIndex, 1);
        }
    }
}
</script>

@endsection
