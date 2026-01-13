@extends('layout.app')

@section('content')
<div class="w-full p-1">
    {{-- Card Besar --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-[#0D1B5C] mb-6">Edit Info LSP</h2>

        <form action="#" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6">

                {{-- Nama LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama LSP</label>
                    <input type="text" name="nama_lsp" value="{{ $lsp->nama_lsp ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- SK Lisensi --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">SK Lisensi</label>
                    <input type="text" name="sk_lisensi" value="{{ $lsp->sk_lisensi ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- ID Lisensi LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID Lisensi LSP</label>
                    <input type="text" name="id_lisensi" value="{{ $lsp->id_lisensi ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Masa Berlaku LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Masa Berlaku LSP</label>
                    <input type="date" name="masa_berlaku" value="{{ $lsp->masa_berlaku ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- SK Persetujuan SJJ --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">SK Persetujuan SJJ (Jika Ada)</label>
                    <input type="text" name="sk_persetujuan_sjj" value="{{ $lsp->sk_persetujuan_sjj ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Direktur/Manager --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Direktur / Manager</label>
                    <input type="text" name="direktur" value="{{ $lsp->direktur ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Dewan Pengarah LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dewan Pengarah LSP</label>
                    <input type="text" name="dewan_pengarah" value="{{ $lsp->dewan_pengarah ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Email LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail LSP</label>
                    <input type="email" name="email" value="{{ $lsp->email ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Alamat LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat LSP</label>
                    <input type="text" name="alamat" value="{{ $lsp->alamat ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Kota/Kabupaten --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kota / Kabupaten</label>
                    <input type="text" name="kota" value="{{ $lsp->kota ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Telp/HP LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telp / HP LSP</label>
                    <input type="text" name="telp" value="{{ $lsp->telp ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Website Informasi --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website Informasi</label>
                    <input type="text" name="website" value="{{ $lsp->website ?? '' }}"
                           class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                {{-- Visi LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Visi LSP</label>
                    <textarea name="visi" rows="3"
                              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>{{ $lsp->visi ?? '' }}</textarea>
                </div>

                {{-- Misi LSP --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Misi LSP</label>
                    <textarea name="misi" rows="3"
                              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>{{ $lsp->misi ?? '' }}</textarea>
                </div>

            </div>

            {{-- Tombol Simpan Nonaktif --}}
            <div class="mt-6 text-right">
                <button type="button" class="bg-blue-600 text-white px-6 py-2 rounded-lg cursor-not-allowed" disabled>
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
