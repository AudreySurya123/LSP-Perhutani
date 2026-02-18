<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdCardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UnitKompetensiController;
use App\Http\Controllers\ElemenController;

// Halaman login
Route::get('/', function () {
    return view('awalan');
})->name('awalan');

// Halaman pendaftaran user
Route::get('/pendaftaran', [UserController::class, 'create'])->name('pendaftaran');
Route::post('/pendaftaran', [UserController::class, 'store'])->name('asesi.store');

// ASESI
Route::get('loginasesi', [AuthController::class, 'showLogin'])->defaults('role', 'asesi')->name('loginasesi');
Route::post('loginasesi', [AuthController::class, 'login'])->defaults('role', 'asesi');

// ADMIN
Route::get('loginadmin', [AuthController::class, 'showLogin'])->defaults('role', 'admin')->name('loginadmin'); // beri nama route
Route::post('loginadmin', [AuthController::class, 'login'])->defaults('role', 'admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ASESOR
Route::get('loginasesor', [AuthController::class, 'showLogin'])->defaults('role', 'asesor')->name('loginasesor');
Route::post('loginasesor', [AuthController::class, 'login'])->defaults('role', 'asesor');

// Dashboard
Route::get('/dashboard-admin', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard');

Route::get('/dashboard-asesi', function () {
    return view('pages.asesi.dashboard');
})->name('asesi.dashboard');

Route::get('/dashboard-asesor', function () {
    return view('pages.asesor.dashboard');
})->name('asesor.dashboard');

Route::get('/dashboard-adminasesi', function () {
    return view('pages.adminasesi.dashboard');
})->name('adminasesi.dashboard');

// Halaman Edit Info LSP
Route::get('/info-lsp', function () {
    return view('pages.admin.edit_info_lsp');
})->name('info-lsp');

// Halaman Jadwal Pendaftaran
Route::get('/jadwal-pendaftaran', function () {
    return view('pages.admin.jadwal_pendaftaran');
})->name('jadwal-pendaftaran');

// Halaman Verifikasi Pendaftaran
Route::get('/asesi/verifikasi-pendaftaran', [UserController::class, 'verifikasi'])->name('asesi.verifikasi-pendaftaran');
Route::post('/asesi/verifikasi/{id}', [UserController::class, 'approve'])->name('asesi.verifikasi');
Route::post('/asesi/tolak/{id}', [UserController::class, 'reject'])->name('asesi.tolak');
Route::get('/asesi/asesi-verifikasi', [UserController::class, 'aktif'])->name('asesi.aktif');
Route::get('/asesi/asesi-ditolak', [UserController::class, 'ditolak'])->name('asesi.ditolak');
Route::post('/asesi/batalkan/{id}', [UserController::class, 'restore'])->name('asesi.batalkan');
Route::delete('/asesi/hapus-permanen/{id}', [UserController::class, 'destroy'])->name('asesi.hapus-permanen');
Route::get('/asesi/asesi-proses', [UserController::class, 'proses'])->name('asesi.proses');
Route::get('/asesi/asesi-selesai', [UserController::class, 'selesai'])->name('asesi.selesai');
Route::get('/asesi/download/{id}', [UserController::class, 'downloadData'])->name('asesi.download');

// Halaman Presensi Asesmen
Route::get('/asesmen/presensi', function () {
    return view('pages.admin.presensi');
})->name('asesmen.presensi');

// Halaman Daftar TUK
Route::get('/asesmen/daftar-tuk', function () {
    return view('pages.admin.daftar_tuk');
})->name('asesmen.daftar-tuk');

// Agenda Asesmen
Route::get('/asesmen/agenda', function () {
    return view('pages.admin.agenda_asesmen');
})->name('asesmen.agenda');

// Laporan Asesmen
Route::get('/asesmen/laporan', function () {
    return view('pages.admin.laporan_asesmen');
})->name('asesmen.laporan');

// Daftar Personel LSP
Route::get('/personel-lsp', function () {
    return view('pages.admin.personel_lsp');
})->name('personel-lsp');

// === USER / ADMIN ===
Route::get('/user/admin', [UserController::class, 'daftarAdmin'])->name('admin.index');
Route::get('/user/admin/tambah', [UserController::class, 'createAdmin'])->name('admin.create');
Route::post('/user/admin/store', [UserController::class, 'storeAdmin'])->name('admin.store');
Route::get('/user/admin/edit/{id}', [UserController::class, 'editAdmin'])->name('admin.edit');
Route::put('/user/admin/update/{id}', [UserController::class, 'updateAdmin'])->name('admin.update');

// Daftar asesor
Route::get('/user/asesor', [UserController::class, 'indexAsesor'])->name('asesor.index');
Route::get('/user/asesor/tambah', [UserController::class, 'createAsesor'])->name('asesor.create');
Route::post('/user/asesor/simpan', [UserController::class, 'storeAsesor'])->name('asesor.store');
Route::get('/user/asesor/edit/{id}', [UserController::class, 'editAsesor'])->name('asesor.edit');
Route::put('/user/asesor/update/{id}', [UserController::class, 'updateAsesor'])->name('asesor.update');

Route::get('/user/pleno', function () {
    return view('pages.admin.daftar_direktur_pleno');
});

Route::get('/user/lainnya', function () {
    return view('pages.admin.user_lainnya');
});

// Halaman Banding
Route::get('/lainnya/banding', function () {
    return view('pages.admin.banding');
});

// Halaman Perjanjian Pemegang Sertifikat
Route::get('/lainnya/perjanjian', function () {
    return view('pages.admin.perjanjian');
});

Route::get('/lainnya/surveillen', function () {
    return view('pages.admin.surveillen');
});

// Halaman Daftar Skema
Route::get('/lainnya/daftar-skema', [SkemaController::class, 'index'])
    ->name('skema.index');

Route::get('/lainnya/skema/tambah', function () {
    return view('pages.admin.tambah_skema');
})->name('tambah.skema');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/skema', [SkemaController::class, 'index'])->name('skema.index');
    Route::get('/skema/tambah', [SkemaController::class, 'create'])->name('skema.create');
    Route::post('/skema/store', [SkemaController::class, 'store'])->name('skema.store');
    Route::get('/skema/edit/{id}', [SkemaController::class, 'edit'])->name('skema.edit');
    Route::put('/skema/update/{id}', [SkemaController::class, 'update'])->name('skema.update');
    Route::delete('/skema/delete/{id}', [SkemaController::class, 'destroy'])->name('skema.destroy');
});

Route::prefix('skema')->group(function () {
    Route::get('{skema}/unit', [UnitKompetensiController::class, 'index'])->name('unit.index');
    Route::get('{skema}/unit/create', [UnitKompetensiController::class, 'create'])->name('unit.create');
    Route::post('{skema}/unit', [UnitKompetensiController::class, 'store'])->name('unit.store');
    Route::get('{skema}/unit/{id}/edit', [UnitKompetensiController::class, 'edit'])->name('unit.edit');
    Route::put('{skema}/unit/{id}', [UnitKompetensiController::class, 'update'])->name('unit.update');
    Route::delete('{skema}/unit/{id}', [UnitKompetensiController::class, 'destroy'])->name('unit.destroy');
});

// Routes untuk Elemen
Route::prefix('skema/{skema_id}/unit/{unit_id}')->group(function () {
    Route::get('elemen', [ElemenController::class, 'edit'])->name('elemen.edit'); // Ganti dari index ke edit
    Route::post('elemen', [ElemenController::class, 'store'])->name('elemen.store');
    Route::put('elemen', [ElemenController::class, 'update'])->name('elemen.update');
    Route::delete('elemen/{elemen_id}', [ElemenController::class, 'destroy'])->name('elemen.destroy');
});



// Lihat Log
Route::get('/lainnya/lihat-log', function () {
    return view('pages.admin.lihat_log');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/id-card', [IdCardController::class, 'index'])
        ->name('idcard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/download/{id}', [UserController::class, 'downloadData'])
        ->name('user.download');
});

Route::get('/idcard/download', [IdCardController::class, 'download'])
    ->name('idcard.download');

// Halaman kelola akun
Route::get('/kelola-akun', [UserController::class, 'kelolaAkun'])
    ->name('akun.kelola')->middleware('auth');

// Ubah kata sandi
Route::post('/akun/ubah-password', [UserController::class, 'ubahPassword'])
    ->name('akun.ubah_password')->middleware('auth');

// Hapus akun
Route::delete('/akun/hapus', [UserController::class, 'hapusAkun'])
    ->name('akun.hapus')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/presensi', function () {
        return view('pages.asesi.presensi'); // langsung ke blade
    })->name('pages.asesi.presensi');
});

// Route menampilkan data asesi
Route::middleware(['auth'])->group(function () {
    Route::get('/pra-asesmen/data-asesi', function () {
        $asesi = auth()->user();
        return view('pages.asesi.data_asesi', compact('asesi'));
    })->name('asesi.data');
});

Route::view('/pra-asesmen/data-sertifikasi', 'pages.asesi.data_sertifikasi')
    ->name('pra-asesmen.data-sertifikasi');

Route::view('/pra-asesmen/bukti-kelengkapan', 'pages.asesi.bukti_kelengkapan')
    ->name('pra-asesmen.bukti-kelengkapan');

Route::view('/pra-asesmen/tanda-tangan', 'pages.asesi.tanda_tangan')
    ->name('pra-asesmen.tanda-tangan');

Route::view('/profil', 'pages.asesor.profil')
    ->name('profil');

Route::view('/ubah-password', 'pages.asesor.ubah_password')
    ->name('ubah-password');

Route::view('/asesi-proses', 'pages.asesor.asesi_proses')
    ->name('asesi-proses');

Route::view('/asesik', 'pages.asesor.asesi_k')
    ->name('asesik');

Route::view('/asesibk', 'pages.asesor.asesi_bk')
    ->name('asesibk');

Route::view('/presensiase', 'pages.asesor.presensi_asesor')
    ->name('presensiase');

Route::view('/muk', 'pages.asesor.muk')
    ->name('muk');

Route::view('/bank-materi', 'pages.asesor.bank_materi')
    ->name('bank-materi');

Route::view('/lapkeg', 'pages.asesor.laporan_kegiatan')
    ->name('lapkeg');

Route::view('/pemegang-sertif', 'pages.asesor.pemegang_sertifikat')
    ->name('pemegang-sertif');

Route::get('/admin/akses-asesi/{id}', function ($id) {
    session([
        'akses_sebagai' => 'asesi',
        'akses_asesi_id' => $id,
    ]);

    return redirect('/dashboard-adminasesi');
})->middleware('auth')->name('admin.akses.asesi');

Route::get('/admin/keluar-akses', function () {
    session()->forget(['akses_sebagai', 'akses_asesi_id']);
    return redirect('/dashboard-admin');
})->middleware('auth')->name('admin.keluar.akses');

Route::get('/asesi/edit-skema', function () {
    return view('pages.adminasesi.edit_skema');
})->middleware('auth')->name('pages.adminasesi.edit_skema');

Route::get('/asesi/metode', function () {
    return view('pages.adminasesi.metode_pembayaran');
})->middleware('auth')->name('pages.adminasesi.metode_pembayaran');

Route::get('/asesi/apl01', function () {
    return view('pages.adminasesi.apl01');
})->middleware('auth')->name('pages.adminasesi.apl01');

Route::get('/asesi/apl02', function () {
    return view('pages.adminasesi.apl02');
})->middleware('auth')->name('pages.adminasesi.apl02');

Route::get('/asesi/asetuk', function () {
    return view('pages.adminasesi.pilih_asetuk');
})->middleware('auth')->name('pages.adminasesi.pilih_asetuk');

Route::get('/asesi/idcard', function () {
    return view('pages.adminasesi.idcard');
})->middleware('auth')->name('pages.adminasesi.idcard');
