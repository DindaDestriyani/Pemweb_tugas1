<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function(){
    return view('web.homepage');
});
Route::get('products', function(){
    return view('web.products');
});
Route::get('product/{slug}', function($slug){
    return "halaman single product - ".$slug;
});
Route::get('categories', function(){
    return view('web.categories');
});
Route::get('category/{slug}', function($slug){
    return "halaman single category - ".$slug;
});
Route::get('cart', function(){
    return "halaman cart";
});
Route::get('checkout', function(){
    return "halaman checkout";
});

// Route::get('/beranda', function(){
//     return 'Welcome to E-Commerce';
// });

// Route::get('/daftar-produk', function(){
//     return 'Daftar semua produk';
// });

// Route::get('/detail-belanja', function(){
//     return 'Detail belanja';
// });

// Route::get('/keranjang', function(){
//     return 'Keranjang belanja pengguna';
// });

// Route::get('/cart', function(){
//     return 'Menambahkan produk ke keranjang belanja';
// });

// Route::get('/pembayaran', function(){
//     return 'Halaman pembayaran';
// });

// Route::get('/checkout', function(){
//     return 'Checkout berhasil';
// });

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
