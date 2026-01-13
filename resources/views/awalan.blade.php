<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSP Perhutani - Menu Utama</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center p-6">

        <!-- LOGO -->
        <div class="mb-12">
            <img src="{{ asset('images/logo.png') }}" class="w-80 h-auto"> <!-- dibesarkan -->
        </div>

        <!-- HORIZONTAL MENU -->
        <div class="flex flex-wrap justify-center gap-12">

            <!-- MENU INFORMASI -->
            <a href="#"
                class="flex flex-col items-center bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition w-56">
                <img src="{{ asset('images/informasi.png') }}" class="w-32 h-32 mb-3"> <!-- icon lebih besar -->
                <span class="text-xl font-semibold tracking-wide">INFORMASI</span>
            </a>

            <!-- MENU PENDAFTARAN -->
            <a href="{{ route('pendaftaran') }}"
                class="flex flex-col items-center bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition w-56">
                <img src="{{ asset('images/register.png') }}" class="w-32 h-32 mb-3">
                <span class="text-xl font-semibold tracking-wide">PENDAFTARAN</span>
            </a>

            <!-- MENU LOGIN (HANYA ASESI) -->
            <a href="loginasesi?lsp=perhutani"
                class="flex flex-col items-center bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition w-56">
                <img src="{{ asset('images/login.png') }}" class="w-32 h-32 mb-3">
                <span class="text-xl font-semibold tracking-wide">LOGIN</span>
            </a>
        </div>

    </div>

</body>

</html>
