<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PeFI' }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 flex">

    @include('layout.sidebar')

    <div class="flex-1 flex flex-col min-h-screen">

        @include('layout.header')

        <main class="p-6">
            @yield('content')
        </main>

        @include('layout.footer')

    </div>

    <script>
        // Auto render icons lucide
        lucide.createIcons();
    </script>

</body>

</html>

<script>
    lucide.createIcons();

    const menuBtn = document.getElementById('menu-toggle');
    const closeBtn = document.getElementById('menu-close');
    const sidebar = document.getElementById('sidebar');

    menuBtn?.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
    });

    closeBtn?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });
</script>
