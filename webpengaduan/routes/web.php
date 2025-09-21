<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('login'); // halaman login
})->name('login');

Route::post('/login', function (Request $request) {
    $user = User::where('username', $request->input('username'))->first();

    if ($user && Hash::check($request->input('password'), $user->password)) {
        // simpan ke session permanen
//        session(['username' => $user->name]);

        // login user ke Laravel Auth
        Auth::login($user);
        // cek role user
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // route dashboard admin
        } else {
            return redirect()->route('welcome'); // route untuk user biasa
        }
    }

    return redirect()->route('login')->with('error', 'Username atau Password salah!');

//        return redirect()->route('welcome');
//    }

    return redirect()->route('login')->with('error', 'Username atau Password salah!');
})->name('login.submit');


Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// halaman welcome
Route::get('/welcome', function () {
    $user = Auth::user();   // ambil user aktif
    return view('welcome', compact('user'));
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
});


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/pengaduan/detail/{id}', [PengaduanController::class, 'detail']);
Route::post('/pengaduan/update-status/{id}', [PengaduanController::class, 'updateStatus']);

Route::get('/admin/sla-report', [App\Http\Controllers\AdminController::class, 'slaReport'])->name('admin.sla-report');
