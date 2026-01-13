@extends('layout.app')

@section('content')
<div class="w-full p-1">
    <div class="max-w-6xl mx-auto bg-white border rounded-xl shadow p-6">
        {{-- Judul Halaman --}}
        <h2 class="text-2xl font-bold text-gray-700 mb-6">
            Bagian 2: Data Sertifikasi
        </h2>

        <p class="mb-4 text-gray-600">
            Tuliskan Judul dan Nomor Skema Sertifikasi, Tujuan Asesmen serta Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi yang anda ajukan untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.
        </p>

        {{-- Skema Sertifikasi --}}
        <div class="mb-6">
            <table class="w-full border border-gray-200">
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left w-1/3">Skema Sertifikasi/ Klaster Asesmen</th>
                    <td class="px-4 py-2 w-1/3">Judul</td>
                    <td class="px-4 py-2">Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="px-4 py-2">Nomor</td>
                    <td class="px-4 py-2">009/SKM/LSPPHT/2022</td>
                </tr>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Tujuan Asesmen</th>
                    <td class="px-4 py-2" colspan="2">Sertifikasi</td>
                </tr>
            </table>
        </div>

        {{-- Daftar Unit Kompetensi --}}
        <div>
            <h3 class="text-lg font-semibold mb-2">Daftar Unit Kompetensi sesuai kemasan:</h3>
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No.</th>
                        <th class="px-4 py-2 border">Kode Unit</th>
                        <th class="px-4 py-2 border">Judul Unit</th>
                        <th class="px-4 py-2 border">Standar Kompetensi Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $units = [
                            ['A.02GNS01.001.1', 'Menerapkan Keselamatan, dan Kesehatan Kerja (K3)'],
                            ['A.02GNS01.002.1', 'Mengorganisasikan Pekerjaan'],
                            ['A.02GNS01.003.1', 'Melakukan Komunikasi Efektif'],
                            ['A.02GNS01.008.1', 'Menyusun rencana kerja inventarisasi tegakan'],
                            ['A.02GNS01.009.1', 'Melaksanakan inventarisasi tegakan hutan'],
                            ['A.02GNS01.010.1', 'Menyusun laporan hasil inventarisasi tegakan'],
                            ['A.02GNS01.011.1', 'Menyusun Rencana Pengelolaan Jangka Panjang Pemanfaatan Hasil Hutan Kayu'],
                            ['A.02GNS01.012.1', 'Menyusun Rencana Pengelolaan Jangka Panjang Pemanfaatan Hasil Hutan Kayu'],
                        ];
                    @endphp
                    @foreach($units as $index => $unit)
                    <tr class="{{ $index % 2 == 0 ? '' : 'bg-gray-50' }}">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $unit[0] }}</td>
                        <td class="px-4 py-2 border">{{ $unit[1] }}</td>
                        <td class="px-4 py-2 border text-center">SKKNI</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
