@extends('layout.app')

@section('content')
    <div class="p-1">
        <div class="max-w-6xl mx-auto space-y-6">

            {{-- ================= HEADER ICON AKSI ================= --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                {{-- Rekam Foto --}}
                <div class="bg-white border rounded-xl shadow p-4 flex items-center gap-4 hover:bg-gray-50 cursor-pointer">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                        <i class="lucide-camera"></i>
                    </div>
                    <span class="font-semibold text-gray-700">Rekam Foto</span>
                </div>

                {{-- Rekam Berkas --}}
                <div class="bg-white border rounded-xl shadow p-4 flex items-center gap-4 hover:bg-gray-50 cursor-pointer">
                    <div class="p-3 bg-green-100 text-green-600 rounded-full">
                        <i class="lucide-file"></i>
                    </div>
                    <span class="font-semibold text-gray-700">Rekam Berkas</span>
                </div>

                {{-- Rekam Video --}}
                <div class="bg-white border rounded-xl shadow p-4 flex items-center gap-4 hover:bg-gray-50 cursor-pointer">
                    <div class="p-3 bg-red-100 text-red-600 rounded-full">
                        <i class="lucide-video"></i>
                    </div>
                    <span class="font-semibold text-gray-700">Rekam Video</span>
                </div>

                {{-- Rekam Link --}}
                <div class="bg-white border rounded-xl shadow p-4 flex items-center gap-4 hover:bg-gray-50 cursor-pointer">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-full">
                        <i class="lucide-link"></i>
                    </div>
                    <span class="font-semibold text-gray-700">Rekam Link</span>
                </div>
            </div>

            {{-- ================= CARD UNGGAH BUKTI ================= --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- ================= CARD BUKTI UMUM ================= --}}
    <div class="bg-white border rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-gray-700 mb-4">
            Unggah Bukti Kompetensi
        </h3>

        <p class="text-gray-600 mb-4">
            Unggah bukti berupa foto, dokumen, atau link yang menunjukkan kompetensi Anda.
        </p>

        <div class="space-y-3">
            <div class="border border-dashed rounded-lg p-4 text-center text-gray-500">
                <i class="lucide-upload mb-2"></i>
                <p>Tarik & lepas file di sini</p>
                <p class="text-sm">(Foto / PDF / Dokumen)</p>
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Pilih File
            </button>
        </div>
    </div>

    {{-- ================= CARD BUKTI VIDEO ================= --}}
    <div class="bg-white border rounded-xl shadow p-6">
        <h3 class="text-xl font-bold text-gray-700 mb-4">
            Unggah Bukti Kompetensi (Video)
        </h3>

        <p class="text-gray-600 mb-4">
            Unggah atau tautkan video yang memperlihatkan aktivitas atau hasil kerja Anda.
        </p>

        <div class="space-y-3">
            <div class="border border-dashed rounded-lg p-4 text-center text-gray-500">
                <i class="lucide-video mb-2"></i>
                <p>Unggah video atau masukkan link</p>
                <p class="text-sm">(MP4 / YouTube / Drive)</p>
            </div>

            <input type="text"
                class="w-full border rounded px-3 py-2"
                placeholder="Tempelkan link video di sini">

            <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">
                Unggah Video
            </button>
        </div>
    </div>

</div>

        </div>
    </div>
@endsection
