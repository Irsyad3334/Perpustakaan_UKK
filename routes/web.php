<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\ProfilController; // Pastikan untuk mengimpor controller yang sesuai

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\PerpustakaanController;

use App\Http\Controllers\RakController;

use App\Http\Controllers\DdcController;


use App\Http\Controllers\FormatController;

use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\JenisAnggotaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserPerpustakaanController;
use App\Http\Controllers\UserDdcController;
use App\Http\Controllers\UserFormatController;
use App\Http\Controllers\UserPustakaController;
use App\Http\Controllers\UserJenisAnggotaController;
use App\Http\Controllers\UserAnggotaController;
use App\Http\Controllers\UserTransaksiController;
use App\Http\Controllers\UserPenerbitController;
use App\Http\Controllers\UserRakController;
use App\Http\Controllers\UserPengarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});











Route::prefix('admin')->middleware('auth', 'admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/perpustakaan', [AdminController::class, 'perpustakaan'])->name('admin.perpustakaan');
    Route::get('/rak', [AdminController::class, 'rak'])->name('admin.rak');
    Route::get('/ddc', [AdminController::class, 'ddc'])->name('admin.ddc');
    Route::get('/format', [AdminController::class, 'format'])->name('admin.format');
    Route::get('/penerbit', [AdminController::class, 'penerbit'])->name('admin.penerbit');
    Route::get('/pengarang', [AdminController::class, 'pengarang'])->name('admin.pengarang');
    Route::get('/pustaka', [AdminController::class, 'pustaka'])->name('admin.pustaka');
    Route::get('/jenis_anggota', [AdminController::class, 'jenisAnggota'])->name('admin.jenis_anggota');
    Route::get('/anggota', [AdminController::class, 'anggota'])->name('admin.anggota');
    Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('admin.transaksi');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');




    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });




    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/manajemen-buku', [AdminController::class, 'manajemenBuku'])->name('admin.manajemen_buku');
        Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('admin.transaksi');
        Route::get('/penerbit', [AdminController::class, 'penerbit'])->name('admin.penerbit');
        Route::get('/rak', [AdminController::class, 'rak'])->name('admin.rak');
        Route::get('/ddc', [AdminController::class, 'ddc'])->name('admin.ddc');
        Route::get('/format', [AdminController::class, 'format'])->name('admin.format');
        Route::get('/pengarang', [AdminController::class, 'pengarang'])->name('admin.pengarang');
        Route::get('/pustaka', [AdminController::class, 'pustaka'])->name('admin.pustaka');
        Route::get('/jenis-anggota', [AdminController::class, 'jenisAnggota'])->name('admin.jenis_anggota');
        Route::get('/anggota', [AdminController::class, 'anggota'])->name('admin.anggota');
    });



// Rute yang benar
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Untuk profil dashboard
Route::get('/profil/dashboard', [ProfilController::class, 'dashboard'])->name('profil.dashboard');

// Route untuk profil pustaka
Route::get('/profil/pustaka', [ProfilController::class, 'pustaka'])->name('profil.pustaka');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::post('/logout', function () {
    Auth::logout(); // Logout user
    return redirect('/'); // Redirect ke halaman beranda atau halaman yang diinginkan
})->name('logout');
});






// Rute untuk Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk Welcome
Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');





Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Tambahkan rute lainnya sesuai kebutuhan
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
    // Definisikan rute lainnya di sini
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('rak', [RakController::class, 'index'])->name('rak.index');
});



Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('ddc', DdcController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('format', FormatController::class);
});

// Route untuk PenerbitController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('penerbit', PenerbitController::class);
});

// Route untuk PengarangController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pengarang', PengarangController::class);
});

// Route untuk PustakaController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pustaka', PustakaController::class);
});

// Route untuk JenisAnggotaController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('jenis_anggota', JenisAnggotaController::class);
});

// Route untuk JenisAnggotaController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('jenis_anggota', JenisAnggotaController::class);
});

// Route untuk AnggotaController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('anggota', AnggotaController::class);
});

// Route untuk TransaksiController (khusus admin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

Route::resource('perpustakaan', PerpustakaanController::class);
Route::resource('rak', RakController::class);
Route::resource('ddc', DdcController::class);


Route::resource('format', FormatController::class);

Route::resource('penerbit', PenerbitController::class);

Route::resource('pengarang', PengarangController::class);




// Route untuk menampilkan form create
Route::get('/pustaka/create', [PustakaController::class, 'create'])->name('pustaka.create');

// Route untuk menyimpan data pustaka
Route::post('/pustaka', [PustakaController::class, 'store'])->name('pustaka.store');

// Route untuk menampilkan data pustaka (index)
Route::get('/pustaka', [PustakaController::class, 'index'])->name('pustaka.index');

// Route untuk menampilkan form edit pustaka
Route::get('/pustaka/{id_pustaka}/edit', [PustakaController::class, 'edit'])->name('pustaka.edit');

// Route untuk mengupdate data pustaka
Route::put('/pustaka/{id_pustaka}', [PustakaController::class, 'update'])->name('pustaka.update');

// Route untuk menghapus pustaka
Route::delete('/pustaka/{id_pustaka}', [PustakaController::class, 'destroy'])->name('pustaka.destroy');

// Route untuk menampilkan detail pustaka
Route::get('/pustaka/{id_pustaka}', [PustakaController::class, 'show'])->name('pustaka.show');



Route::resource('jenis_anggota', JenisAnggotaController::class);





Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id_anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id_anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id_anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');


Route::resource('transaksi', TransaksiController::class);







Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('user.perpustakaan.index');


Route::get('/dashboard', function () {
    return view('user.dashboard'); // Pastikan mengarah ke resources/views/user/dashboard.blade.php

});

Route::prefix('user/perpustakaan')->name('user.perpustakaan.')->group(function() {
    Route::get('/', [PerpustakaanController::class, 'index'])->name('index'); // Halaman utama perpustakaan
    Route::get('/create', [PerpustakaanController::class, 'create'])->name('create'); // Halaman tambah
    Route::post('/', [PerpustakaanController::class, 'store'])->name('store'); // Proses simpan
    Route::get('/{id}/edit', [PerpustakaanController::class, 'edit'])->name('edit'); // Halaman edit
    Route::put('/{id}', [PerpustakaanController::class, 'update'])->name('update'); // Proses update
    Route::delete('/{id}', [PerpustakaanController::class, 'destroy'])->name('destroy'); // Proses hapus
});

Route::get('/dashboard', [UserController::class, 'showDashboard']);
Route::get('/perpustakaan', function () {
    return view('perpustakaan.index');
});

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');
Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('user.perpustakaan.index');
Route::get('/perpustakaan/{id}/edit', [PerpustakaanController::class, 'edit'])->name('perpustakaan.edit');


Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('rak')->name('rak.')->group(function() {
        Route::get('/', [RakController::class, 'index'])->name('index'); // Halaman daftar rak
        Route::get('/create', [RakController::class, 'create'])->name('create'); // Halaman tambah rak
        Route::post('/', [RakController::class, 'store'])->name('store'); // Proses simpan rak
        Route::get('/{id}/edit', [RakController::class, 'edit'])->name('edit'); // Halaman edit rak
        Route::put('/{id}', [RakController::class, 'update'])->name('update'); // Proses update rak
        Route::delete('/{id}', [RakController::class, 'destroy'])->name('destroy'); // Proses hapus rak
    });
});



Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('ddc')->name('ddc.')->group(function() {
        Route::get('/', [DdcController::class, 'index'])->name('index'); // Halaman daftar DDC
        Route::get('/create', [DdcController::class, 'create'])->name('create'); // Halaman tambah DDC
        Route::post('/', [DdcController::class, 'store'])->name('store'); // Proses simpan DDC
        Route::get('/{id}/edit', [DdcController::class, 'edit'])->name('edit'); // Halaman edit DDC
        Route::put('/{id}', [DdcController::class, 'update'])->name('update'); // Proses update DDC
        Route::delete('/{id}', [DdcController::class, 'destroy'])->name('destroy'); // Proses hapus DDC
    });
});

Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('format')->name('format.')->group(function() {
        Route::get('/', [FormatController::class, 'index'])->name('index'); // Halaman daftar format
    });
});

Route::get('/user/formats', [UserFormatController::class, 'index'])->name('user.formats.index');

Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('penerbit')->name('penerbit.')->group(function() {
        Route::get('/', [PenerbitController::class, 'index'])->name('index'); // Halaman daftar penerbit
        Route::get('/create', [PenerbitController::class, 'create'])->name('create'); // Halaman tambah penerbit
        Route::post('/', [PenerbitController::class, 'store'])->name('store'); // Proses simpan penerbit
        Route::get('/{id}/edit', [PenerbitController::class, 'edit'])->name('edit'); // Halaman edit penerbit
        Route::put('/{id}', [PenerbitController::class, 'update'])->name('update'); // Proses update penerbit
        Route::delete('/{id}', [PenerbitController::class, 'destroy'])->name('destroy'); // Proses hapus penerbit
    });
});

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function() {
    Route::get('penerbit', [UserPenerbitController::class, 'index'])->name('penerbit.index');
});

Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('pengarang')->name('pengarang.')->group(function() {
        Route::get('/', [PengarangController::class, 'index'])->name('index'); // Halaman daftar pengarang
        Route::get('/create', [PengarangController::class, 'create'])->name('create'); // Halaman tambah pengarang
        Route::post('/', [PengarangController::class, 'store'])->name('store'); // Proses simpan pengarang
        Route::get('/{id}/edit', [PengarangController::class, 'edit'])->name('edit'); // Halaman edit pengarang
        Route::put('/{id}', [PengarangController::class, 'update'])->name('update'); // Proses update pengarang
        Route::delete('/{id}', [PengarangController::class, 'destroy'])->name('destroy'); // Proses hapus pengarang
    });
});

Route::prefix('user')->name('user.')->group(function() {
    Route::get('pengarang', [UserPengarangController::class, 'index'])->name('pengarang.index');
});


Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('pustaka')->name('pustaka.')->group(function() {
        Route::get('/', [PustakaController::class, 'index'])->name('index'); // Halaman daftar pustaka
        Route::get('/create', [PustakaController::class, 'create'])->name('create'); // Halaman tambah pustaka
        Route::post('/', [PustakaController::class, 'store'])->name('store'); // Proses simpan pustaka
        Route::get('/{id}/edit', [PustakaController::class, 'edit'])->name('edit'); // Halaman edit pustaka
        Route::put('/{id}', [PustakaController::class, 'update'])->name('update'); // Proses update pustaka
        Route::delete('/{id}', [PustakaController::class, 'destroy'])->name('destroy'); // Proses hapus pustaka
    });
});


Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('jenis_anggota')->name('jenis_anggota.')->group(function() {
        Route::get('/', [JenisAnggotaController::class, 'index'])->name('index'); // Halaman daftar jenis anggota
        Route::get('/create', [JenisAnggotaController::class, 'create'])->name('create'); // Halaman tambah jenis anggota
        Route::post('/', [JenisAnggotaController::class, 'store'])->name('store'); // Proses simpan jenis anggota
        Route::get('/{id}/edit', [JenisAnggotaController::class, 'edit'])->name('edit'); // Halaman edit jenis anggota
        Route::put('/{id}', [JenisAnggotaController::class, 'update'])->name('update'); // Proses update jenis anggota
        Route::delete('/{id}', [JenisAnggotaController::class, 'destroy'])->name('destroy'); // Proses hapus jenis anggota
    });
});


Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('anggota')->name('anggota.')->group(function() {
        Route::get('/', [AnggotaController::class, 'index'])->name('index'); // Halaman daftar anggota
        Route::get('/create', [AnggotaController::class, 'create'])->name('create'); // Halaman tambah anggota
        Route::post('/', [AnggotaController::class, 'store'])->name('store'); // Proses simpan anggota
        Route::get('/{id}/edit', [AnggotaController::class, 'edit'])->name('edit'); // Halaman edit anggota
        Route::put('/{id}', [AnggotaController::class, 'update'])->name('update'); // Proses update anggota
        Route::delete('/{id}', [AnggotaController::class, 'destroy'])->name('destroy'); // Proses hapus anggota
    });
});


Route::prefix('user')->name('user.')->group(function() {
    Route::prefix('transaksi')->name('transaksi.')->group(function() {
        Route::get('/', [TransaksiController::class, 'index'])->name('index'); // Halaman daftar transaksi
        Route::get('/create', [TransaksiController::class, 'create'])->name('create'); // Halaman tambah transaksi
        Route::post('/', [TransaksiController::class, 'store'])->name('store'); // Proses simpan transaksi
        Route::get('/{id}/edit', [TransaksiController::class, 'edit'])->name('edit'); // Halaman edit transaksi
        Route::put('/{id}', [TransaksiController::class, 'update'])->name('update'); // Proses update transaksi
        Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('destroy'); // Proses hapus transaksi
    });
});

Route::get('/user/perpustakaan', [UserPerpustakaanController::class, 'index'])->name('user.perpustakaan.index');

Route::get('/user/rak', [App\Http\Controllers\UserRakController::class, 'index'])->name('user.rak.index');

Route::prefix('user')->name('user.')->group(function() {
    Route::get('ddc', [UserDdcController::class, 'index'])->name('ddc.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/format', [UserFormatController::class, 'index'])->name('user.format.index');
});

Route::get('/user/pustaka', [UserPustakaController::class, 'index'])->name('user.pustaka.index');
Route::get('/user/pustaka/{id}', [UserPustakaController::class, 'show'])->name('user.pustaka.show');

Route::get('/user/jenis_anggota', [UserJenisAnggotaController::class, 'index'])->name('user.jenis_anggota.index');

Route::get('/user/anggota', [UserAnggotaController::class, 'index'])->name('user.anggota.index');

Route::get('/user/transaksi', [UserTransaksiController::class, 'index'])->name('user.transaksi.index');

Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');

require __DIR__.'/auth.php';









