<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home', ['title' => 'Home']);
})->name('home');

Route::prefix('kategori')->group(function () {
    Route::get('/', function () {
        return redirect()->route('kategori.wanita');
    })->name('kategori');

    Route::get('batik-wanita', function () {
        $kategori = [
            [
                'nama' => 'Kemeja Batik',
                'image' => 'images/kategori/batik-wanita.png',
                'url' => '/kategori/batik-wanita/kemeja-batik'
            ],
            [
                'nama' => 'Blouse Batik',
                'image' => 'images/kategori/batik-wanita.png',
                'url' => '/kategori/batik-wanita/blouse-batik'
            ],
            [
                'nama' => 'Dress Batik',
                'image' => 'images/kategori/batik-wanita.png',
                'url' => '/kategori/batik-wanita/dress-batik'
            ],
            [
                'nama' => 'Outer',
                'image' => 'images/kategori/batik-wanita.png',
                'url' => '/kategori/batik-wanita/outer'
            ],
        ];
        return view('pages.kategori', ['title' => 'Kategori', 'kategori' => $kategori]);
    })->name('kategori.wanita');

    Route::get('batik-pria', function () {
        $kategori = [
            [
                'nama' => 'Kemeja Batik Lengan Panjang',
                'image' => 'images/kategori/batik-pria.png',
                'url' => '/kategori/batik-pria/kemeja-lengan-panjang'
            ],
            [
                'nama' => 'Kemeja Batik Lengan Pendek',
                'image' => 'images/kategori/batik-pria.png',
                'url' => '/kategori/batik-pria/kemeja-lengan-pendek'
            ],
        ];
        return view('pages.kategori', ['title' => 'Kategori', 'kategori' => $kategori]);
    })->name('kategori.pria');

    Route::get('batik-anak', function () {
        $kategori = [
            [
                'nama' => 'Batik Anak Perempuan',
                'image' => 'images/kategori/batik-anak.png',
                'url' => '/kategori/batik-anak/batik-anak-perempuan'
            ],
            [
                'nama' => 'Batik Anak Laki-Laki',
                'image' => 'images/kategori/batik-anak.png',
                'url' => '/kategori/batik-anak/batik-anak-laki-laki'
            ],
        ];
        return view('pages.kategori', ['title' => 'Kategori', 'kategori' => $kategori]);
    })->name('kategori.anak');
});

Route::get('/order', function () {
    return view('pages.order', ['title' => 'Order']);
})->name('order');

Route::get('/kontak', function () {
    return view('pages.kontak', ['title' => 'Hubungi Kami']);
})->name('kontak');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login.index');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
