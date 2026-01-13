{{-- resources/views/pendaftaran.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta - LSP Perhutani</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center p-6" x-data="{ tujuan: '', step: 1, nik: '', skema: '' }">

        <div class="bg-white w-full max-w-lg p-10 rounded-2xl shadow-2xl">

            <!-- LOGO -->
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('images/logo.png') }}" class="w-32 h-auto mb-4">
                <h1 class="text-2xl font-bold text-gray-800 tracking-wide">PENDAFTARAN PESERTA</h1>
            </div>

            <!-- STEP 1: Pilih Tujuan -->
            <div x-show="step === 1" x-transition>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Tujuan Sertifikasi
                    </label>

                    <select x-model="tujuan"
                        class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        <option value="" selected disabled>Pilih tujuan sertifikasi</option>
                        <option value="baru">Sertifikasi Baru</option>
                        <option value="lama">Sertifikasi Lama</option>
                        <option value="siap-asesmen">Sertifikasi Baru (Peserta Siap Asesmen)</option>
                    </select>
                </div>

                <!-- Form tambahan step 1 -->
                <div x-show="tujuan == 'baru'" x-transition>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">NIK KTP</label>
                        <input type="text" x-model="nik"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan NIK KTP">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Skema Sertifikasi</label>
                        <select x-model="skema" id="skema"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                            <option value="" selected disabled>Pilih skema sertifikasi</option>
                            <option>Penyadapan Getah Pinus</option>
                            <option>Persemaian</option>
                            <option>Inventarisasi Tegakan Hutan</option>
                            <option>Klaster Inventarisasi Tegakan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengukuran dan Perpetaan Hutan</option>
                            <option>Klaster Pembuatan Tanaman Jati</option>
                            <option>Klaster Penjarangan Hutan Jati</option>
                            <option>Klaster Tebang Habis Jati</option>
                            <option>Klaster Persemaian Vegetatif</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Perencanaan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanenan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Bulat</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Minyak Atsiri)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Getah)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemungutan Kayu Lapis</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemanfaatan Hasil Hutan Bukan Kayu
                                (Kelompok Resin)</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pemandu Wisata Alam</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pembinaan Hutan</option>
                            <option>Tenaga Teknis Pengelolaan Hutan (GANISPH) Pengujian Kayu Gergajian</option>
                        </select>
                    </div>
                </div>

                <div x-show="tujuan == 'lama'" x-transition>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Cari NIK</label>
                        <input type="text" x-model="nik"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan NIK peserta lama">
                    </div>
                </div>

                <div x-show="tujuan == 'siap-asesmen'" x-transition>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Cari NIK Peserta Siap</label>
                        <input type="text" x-model="nik"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan NIK peserta siap asesmen">
                    </div>
                </div>

                <!-- Button Lanjutkan -->
                <button type="button" @click="step = 2"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold tracking-wide transition">
                    Lanjutkan
                </button>
            </div>

            <!-- STEP 2: Form Lengkap -->
            <div x-show="step === 2" x-transition>
                <form action="{{ route('asesi.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Hidden NIK & Skema dari step 1 -->
                    <input type="hidden" name="nik" :value="nik">
                    <input type="hidden" name="skema_sertifikasi" :value="skema">

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            required>
                            <option value="" selected disabled>Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan email" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">No. Handphone / WA</label>
                        <input type="tel" name="no_hp"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan no. HP/WA" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Lembaga / Perusahaan</label>
                        <input type="text" name="perusahaan"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            placeholder="Masukkan nama lembaga / perusahaan">
                    </div>

                    <!-- Pilihan Pembayaran -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Pilihan Pembayaran</label>
                        <select name="pilihan_pembayaran"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
                            required>
                            <option value="" selected disabled>Pilih metode pembayaran</option>
                            <option value="Sumber Anggaran Biaya Pribadi">
                                Sumber Anggaran Biaya Pribadi
                            </option>

                            <option value="Sumber Anggaran Biaya dari Pemerintah">
                                Sumber Anggaran Biaya dari Pemerintah
                            </option>

                            <option value="Sumber Anggaran dari APBD">
                                Sumber Anggaran dari APBD
                            </option>

                            <option value="Sumber Anggaran dari APBN">
                                Sumber Anggaran dari APBN
                            </option>
                        </select>
                    </div>

                    <!-- Tempat Uji Kompetensi -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Tempat Uji Kompetensi</label>
                        <select name="tuk"
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                            <option value="" selected>-</option>

                            <option value="PT. Kalimutu Sentosa">
                                PT. Kalimutu Sentosa
                            </option>

                            <option value="Wikan">
                                Wikan
                            </option>

                            <option value="Pusdikbang SDM">
                                Pusdikbang SDM
                            </option>

                            <option value="SMK Kehutanan Wali Sembilan">
                                SMK Kehutanan Wali Sembilan
                            </option>

                        </select>
                        <p class="text-gray-500 text-sm mt-1">Anda boleh mengosongkan TUK</p>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold tracking-wide transition">
                            Kirim
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>

</html>
