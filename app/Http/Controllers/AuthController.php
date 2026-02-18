<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin(Request $request)
    {
        $role = request()->route('role'); // role dari route: 'admin', 'asesi', 'asesor'

        // untuk asesi, ambil data session
        $user = $request->session()->get('user');

        // untuk asesor, ambil daftar nama
        $asesors = $role === 'asesor' ? User::where('role', 'asesor')->get() : [];

        return view('login', compact('role', 'asesors', 'user'));
    }

    // Proses login / cari data
    public function login(Request $request)
    {
        $role = request()->route('role');

        // tombol "cari" untuk asesi
        if ($role === 'asesi' && $request->has('cari')) {
            $nik = $request->nik;

            $user = User::where('role', 'asesi')->where('nik', $nik)->first();

            if (!$user) {
                return back()->with('error', 'Data Tidak Tersedia');
            }

            // simpan sementara ke session agar radio skema muncul
            $request->session()->put('user', $user);

            return back();
        }

        // proses login
        if ($role === 'asesi') {
            $validated = $request->validate([
                'nik' => 'required',
                'skema_sertifikasi' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('role', 'asesi')
                ->where('nik', $validated['nik'])
                ->first();

            if ($user && Hash::check($validated['password'], $user->password)) {
                Auth::login($user);
                return redirect()->route('asesi.dashboard');
            }

        } elseif ($role === 'admin') {
            $validated = $request->validate([
                'name' => 'required',      // tetap pakai name
                'password' => 'required',
            ]);

            $user = User::where('role', 'admin')
                ->where('name', $validated['name'])
                ->first();

            if ($user && Hash::check($validated['password'], $user->password)) {
                Auth::login($user);
                return redirect('/dashboard-admin');
            }

        } elseif ($role === 'asesor') {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'password' => 'required',
            ]);

            $user = User::where('role', 'asesor')
                ->where('id', $validated['user_id'])
                ->first();

            if ($user && Hash::check($validated['password'], $user->password)) {
                Auth::login($user);
                return redirect()->route('asesor.dashboard');
            }
        }

        return back()->with('error', 'Login gagal, periksa kembali data Anda');
    }

    // Logout
    public function logout(Request $request)
    {
        // Ambil role sebelum logout
        $role = optional(Auth::user())->role ?? 'admin';

        // HAPUS MODE ADMIN AKSES ASESI (INI KUNCI UTAMA)
        $request->session()->forget([
            'akses_sebagai',
            'akses_asesi_id',
        ]);

        // Logout user
        Auth::logout();

        // Amankan session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect sesuai role
        return match ($role) {
            'asesi' => redirect()->route('loginasesi'),
            'admin' => redirect()->route('loginadmin'),
            'asesor' => redirect()->route('loginasesor'),
            default => redirect('/'),
        };
    }

}
