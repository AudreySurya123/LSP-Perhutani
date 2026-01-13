<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ID Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: white;
        }
    </style>
</head>

<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="border-2 border-black w-[360px] h-[520px] p-4 relative bg-white text-center">

            {{-- LOGO --}}
            <div class="flex justify-between mb-4">
                <img src="{{ public_path('images/lsp.png') }}" class="h-8">
                <img src="{{ public_path('images/bnsp.png') }}" class="h-8">
            </div>

            <h3 class="text-sm font-semibold">Lembaga Sertifikasi Profesi</h3>
            <p class="text-sm mb-4">Perhutani</p>

            {{-- FOTO --}}
            <div class="absolute top-32 right-4 border w-17 h-20 flex items-center justify-center text-xs">
                @if($asesi->foto)
                    <img src="{{ public_path('storage/' . $asesi->foto) }}" class="w-full h-full object-cover">
                @else
                    Foto
                @endif
            </div>

            <div class="mx-auto w-[260px] text-center">
                <h1 class="text-xl font-bold mb-3">{{ $asesi->name }}</h1>

                <p class="text-sm font-semibold">Kompetensi</p>
                <p class="text-sm">{{ $asesi->skema_sertifikasi }}</p>

                <p class="text-sm font-semibold mt-2">Alamat</p>
                <p class="text-sm">{{ $asesi->alamat ?? '-' }}</p>
            </div>

            <div class="mt-6 text-center">
                <div class="inline-block">
                    {!! QrCode::size(90)->generate($qrValue) !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
