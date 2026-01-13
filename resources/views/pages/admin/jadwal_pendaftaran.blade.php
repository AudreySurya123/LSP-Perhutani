@extends('layout.app')

@section('content')
    <div class="w-full p-1">

        {{-- Card Jadwal Aktif Pendaftaran --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-6">
            <h2 class="text-2xl font-bold text-[#0D1B5C] mb-4">Jadwal Aktif Pendaftaran</h2>

            <button id="aktifkan-jadwal"
                class="w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Aktifkan Jadwal
            </button>
        </div>

        {{-- Waktu Tersisa di luar card --}}
        <div class="mb-6 text-gray-700 text-sm font-medium">
            <span>Waktu Tersisa: </span>
            <span id="countdown" class="font-bold text-blue-600">00:00:00</span>
        </div>

    </div>

    {{-- Script Countdown --}}
    <script>
        // Contoh waktu tersisa: 1 hari
        let countdownDate = new Date("{{ $jadwal->tanggal_selesai ?? now() }}").getTime();

        let countdownElement = document.getElementById("countdown");

        function updateCountdown() {
            let now = new Date().getTime();
            let distance = countdownDate - now;

            if (distance < 0) {
                countdownElement.innerHTML = "Pendaftaran berakhir";
                clearInterval(countdownInterval);
                return;
            }

            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }

        let countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown();

        // Button Aktifkan Jadwal (placeholder)
        document.getElementById("aktifkan-jadwal").addEventListener("click", function () {
            alert("Jadwal pendaftaran diaktifkan!");
        });
    </script>
@endsection
