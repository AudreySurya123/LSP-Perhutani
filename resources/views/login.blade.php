<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login {{ strtoupper($role) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <div class="flex flex-col items-center mb-4">
            <img src="{{ asset('images/logo.png') }}" class="w-28 h-auto mb-2">
        </div>
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Login {{ ucfirst($role) }}</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">{{ $errors->first() }}</div>
        @endif

        <form method="POST" class="space-y-3">
            @csrf

            @if($role === 'asesi')
                <div class="space-y-1">
                    <label class="block font-semibold text-sm">Nomor KTP / NIK</label>
                    <input type="text" name="nik" value="{{ old('nik', session('user')->nik ?? '') }}"
                        class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                        required>
                </div>

                <button type="button" id="cariButton"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition text-sm">
                    Cari Data
                </button>

                @if(session('user'))
                    <div class="bg-gray-100 p-2 rounded mb-2 mt-2">
                        <p class="text-sm font-semibold mb-1">Skema Sertifikasi:</p>
                        @php $skema = explode(',', session('user')->skema_sertifikasi); @endphp
                        <div class="flex flex-col space-y-1">
                            @foreach($skema as $s)
                                @php $sTrim = trim($s); @endphp
                                <label class="inline-flex items-center text-sm">
                                    <input type="radio" name="skema_sertifikasi" value="{{ $sTrim }}"
                                        class="form-radio text-blue-500" required {{ session('user')->skema_sertifikasi == $sTrim ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $sTrim }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block font-semibold text-sm">Password</label>
                        <input type="password" name="password"
                            class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                            required>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition text-sm">
                        Login
                    </button>
                @endif

            @elseif($role === 'admin')
                <div class="space-y-1">
                    <label class="block font-semibold text-sm">Nama Admin</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                        required>
                </div>

                <div class="space-y-1">
                    <label class="block font-semibold text-sm">Password</label>
                    <input type="password" name="password"
                        class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition text-sm">
                    Login
                </button>

            @elseif($role === 'asesor')
                <div class="space-y-1">
                    <label class="block font-semibold text-sm">Pilih Nama</label>
                    <select name="user_id"
                        class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                        required>
                        <option value="">-- Pilih Nama --</option>
                        @foreach($asesors as $a)
                            <option value="{{ $a->id }}" {{ old('user_id') == $a->id ? 'selected' : '' }}>
                                {{ $a->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="block font-semibold text-sm">Password</label>
                    <input type="password" name="password"
                        class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition text-sm">
                    Login
                </button>
            @endif
        </form>
    </div>

</body>

</html>

<script>
    document.getElementById('cariButton').addEventListener('click', function () {
        const form = this.closest('form');
        const inputNik = form.querySelector('input[name="nik"]').value;
        if (inputNik.trim() === '') {
            alert('Masukkan NIK terlebih dahulu!');
            return;
        }
        // buat hidden input untuk menandai "Cari Data"
        let hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'cari';
        hidden.value = '1';
        form.appendChild(hidden);
        form.submit();
    });
</script>
