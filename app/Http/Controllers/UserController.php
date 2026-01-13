<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /* =====================================================
     |  PENDAFTARAN ASESI (FORM DEPAN)
     |=====================================================*/
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:users,nik',
            'skema_sertifikasi' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'nullable|email|unique:users,email',
            'no_hp' => 'required',
            'perusahaan' => 'nullable',
            'pilihan_pembayaran' => 'required',
            'tuk' => 'nullable',
        ]);

        User::create([
            'name' => $validated['nama'],
            'nik' => $validated['nik'],
            'skema_sertifikasi' => $validated['skema_sertifikasi'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'email' => $validated['email'] ?? null,
            'no_hp' => $validated['no_hp'],
            'perusahaan' => $validated['perusahaan'],
            'pilihan_pembayaran' => $validated['pilihan_pembayaran'],
            'tuk' => $validated['tuk'],
            'role' => 'asesi',
            'status' => 'pending',
        ]);
        return back()->with('success', 'Pendaftaran berhasil, menunggu verifikasi.');
    }

    /* =====================================================
     |  VERIFIKASI ASESI (ADMIN)
     |=====================================================*/
    public function verifikasi()
    {
        $asesi = User::where('role', 'asesi')
            ->where('status', 'pending')
            ->latest()
            ->get();
        return view('pages.admin.verifikasi_pendaftaran', compact('asesi'));
    }
    public function approve($id)
    {
        $user = User::findOrFail($id);

        $plainPassword = rand(10000000, 99999999);

        $user->update([
            'status' => 'verified',
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword, // ⬅️ WAJIB ADA
        ]);
        return redirect()->route('asesi.aktif')
            ->with('success', 'Asesi berhasil diverifikasi.');
    }
    public function reject($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('asesi.ditolak')
            ->with('success', 'Asesi ditolak.');
    }
    public function aktif()
    {
        // Ambil user dengan role 'asesi' dan status 'verified'
        $asesis = User::where('role', 'asesi')
            ->where('status', 'verified')
            ->latest()
            ->get();
        return view('pages.admin.asesi_verifikasi', compact('asesis'));
    }

    public function ditolak()
    {
        // Ambil user dengan role 'asesi' dan status 'rejected'
        $asesis = User::where('role', 'asesi')
            ->where('status', 'rejected')
            ->latest()
            ->get();
        return view('pages.admin.asesi_ditolak', compact('asesis'));
    }
    public function restore($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => 'pending',
        ]);
        return redirect()->route('asesi.verifikasi-pendaftaran')
            ->with('success', 'Asesi dikembalikan ke verifikasi.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('asesi.ditolak')
            ->with('success', 'Asesi dihapus permanen.');
    }

    public function proses()
    {
        // Asesi yang sedang dalam proses asesmen
        $asesis = User::where('role', 'asesi')
            ->where('status', 'proses')
            ->latest()
            ->get();
        return view('pages.admin.asesi_proses', compact('asesis'));
    }

    public function selesai()
    {
        // Asesi yang sudah selesai asesmen
        $asesis = User::where('role', 'asesi')
            ->where('status', 'selesai')
            ->latest()
            ->get();
        return view('pages.admin.asesi_selesai', compact('asesis'));
    }

    public function downloadData($id)
    {
        $user = User::findOrFail($id);

        $passwordInfo = $user->plain_password
            ? $user->plain_password
            : 'Password sudah diubah oleh asesi';

        $content = "=== DATA LOGIN ASESI ===\n\n";
        $content .= "Nama        : {$user->name}\n";
        $content .= "Perusahaan  : {$user->perusahaan}\n";
        $content .= "NIK         : {$user->nik}\n";
        $content .= "Kata Sandi  : {$passwordInfo}\n";
        $content .= "Skema       : {$user->skema_sertifikasi}\n";
        $fileName = 'akun_asesi_' . $user->nik . '.txt';
        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename={$fileName}");
    }

    /* =====================================================
    |  ASESOR
    |=====================================================*/
    public function indexAsesor()
    {
        // Ambil semua user dengan role 'asesor'
        $asesors = User::where('role', 'asesor')->get();
        return view('pages.admin.daftar_asesor', compact('asesors'));
    }

    public function createAsesor()
    {
        return view('pages.admin.asesor_create');
    }

    public function storeAsesor(Request $request)
    {
        $validated = $request->validate([
            'no_reg_asesor' => 'required|unique:users,no_reg_asesor',
            'name' => 'required',
            'password' => 'required|min:6',
            'bidang_kompetensi' => 'required|array',
        ]);

        // Set foto default dari folder public/images
        $defaultFoto = 'images/default.png';

        User::create([
            'no_reg_asesor' => $validated['no_reg_asesor'],
            'name' => $validated['name'],
            'email' => null,
            'password' => Hash::make($validated['password']),
            'bidang_kompetensi' => $validated['bidang_kompetensi'],
            'role' => 'asesor',
            'status' => 'aktif',
            'foto' => $defaultFoto,
        ]);

        return redirect()->route('asesor.index')
            ->with('success', 'Asesor berhasil ditambahkan dengan foto default.');
    }

    // ======= EDIT ASESOR =======
    public function editAsesor($id)
    {
        $asesor = User::findOrFail($id);
        return view('pages.admin.asesor_edit', compact('asesor'));
    }

    // ======= UPDATE ASESOR =======
    public function updateAsesor(Request $request, $id)
    {
        $asesor = User::findOrFail($id);

        $validated = $request->validate([
            'no_reg_asesor' => 'required|unique:users,no_reg_asesor,' . $id,
            'name' => 'required',
            'password' => 'nullable|min:6',
            'nik' => 'nullable',
            'alamat' => 'nullable',
            'pendidikan' => 'nullable',
            'no_hp' => 'nullable',
            'lisensi_berlaku_sampai' => 'nullable|date',
            'bidang_kompetensi' => 'nullable|array',
        ]);

        $asesor->update([
            'no_reg_asesor' => $validated['no_reg_asesor'],
            'name' => $validated['name'],
            'nik' => $validated['nik'] ?? $asesor->nik,
            'alamat' => $validated['alamat'] ?? $asesor->alamat,
            'pendidikan' => $validated['pendidikan'] ?? $asesor->pendidikan,
            'no_hp' => $validated['no_hp'] ?? $asesor->no_hp,
            'lisensi_berlaku_sampai' => $validated['lisensi_berlaku_sampai'] ?? $asesor->lisensi_berlaku_sampai,
            'bidang_kompetensi' => $validated['bidang_kompetensi'] ?? $asesor->bidang_kompetensi,
            'password' => $validated['password'] ? Hash::make($validated['password']) : $asesor->password,
        ]);
        return redirect()->route('asesor.index')
            ->with('success', 'Asesor berhasil diperbarui.');
    }

    public function daftarAdmin()
    {
        // Ambil semua admin
        $admins = User::where('role', 'admin')->get();

        // Pisahkan berdasarkan level
        $managers = $admins->where('admin_level', 'manager');
        $generals = $admins->where('admin_level', 'general');
        $tuks = $admins->where('admin_level', 'tuk');
        return view('pages.admin.daftar_admin', compact('managers', 'generals', 'tuks'));
    }

    public function createAdmin()
    {
        return view('pages.admin.admin_create'); // path blade sesuai foldermu
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'kode_admin' => 'required|unique:users,kode_admin',
            'name' => 'required',
            'admin_level' => 'required|in:manager,general,tuk',
            'password' => 'required|min:6',
            'tuk' => 'required_if:admin_level,tuk|array',
        ]);

        User::create([
            'kode_admin' => $validated['kode_admin'],
            'name' => $validated['name'],
            'admin_level' => $validated['admin_level'],
            'tuk' => $request->admin_level === 'tuk'
                ? implode(', ', $request->tuk)
                : null,
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
            'status' => 'aktif',
        ]);
        return redirect('/user/admin')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);

        // daftar TUK (SAMAKAN dengan create, tapi khusus edit)
        $tuks = [
            'PT Kalimutu Sentosa',
            'Wikan',
            'Pusdikbang SDM',
            'SMK Kehutanan Wali Sembilan',
        ];

        return view('pages.admin.admin_edit', compact('admin', 'tuks'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'tuk' => 'nullable|array', // jika admin tuk
        ]);

        $admin->name = $validated['name'];

        if (!empty($validated['password'])) {
            $admin->password = bcrypt($validated['password']);
        }

        if ($admin->admin_level === 'tuk') {
            $admin->tuk = $request->tuk
                ? implode(', ', $request->tuk)
                : null;
        }

        $admin->save();
        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    public function kelolaAkun()
    {
        return view('pages.asesi.kelola_akun'); // pastikan blade ada di resources/views/pages/kelola_akun.blade.php
    }

    // Ubah password user login
    public function ubahPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed', // gunakan new_password_confirmation
        ]);

        $user = Auth::user();

        // Cek kata sandi lama
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Kata sandi lama salah.');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Kata sandi berhasil diubah.');
    }

    // Hapus akun user login
    public function hapusAkun()
    {
        $user = Auth::user();

        Auth::logout(); // logout dulu sebelum hapus
        $user->delete();

        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }

    public function dataSertifikasi()
    {
        // Jika ingin bisa kirim data ke view, misalnya:
        // $units = Unit::all();
        return view('pages.asesi.data_sertifikasi');
    }
}
