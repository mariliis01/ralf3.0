<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('weather', [WeatherController::class, 'getWeather'])->name('weather');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/googlemaps/maps', [MarkerController::class, 'index'])->name('googlemaps.maps');
Route::get('/googlemaps/create', [MarkerController::class, 'create'])->name('googlemaps.create');
Route::post('/googlemaps', [MarkerController::class, 'store'])->name('googlemaps.store');
Route::get('/googlemaps/{id}/edit', [MarkerController::class, 'edit'])->name('googlemaps.edit');
Route::put('/googlemaps/{id}', [MarkerController::class, 'update'])->name('googlemaps.update');
Route::delete('/googlemaps/{id}', [MarkerController::class, 'destroy'])->name('googlemaps.destroy');

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::resource('/products', ProductController::class);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//Route::get('/products', [ProductController::class, 'products.index']);
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');

Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/update-cart/{id}',[ProductController::class, 'updateCart'])->name('update.cart');
Route::get('/remove-from-cart/{id}', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');

Route::post('/checkout', [OrderController::class, 'handleCheckout'])->name('checkout');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.show');
Route::post('/handle-checkout', [OrderController::class, 'handleCheckout'])->name('handle.checkout');


require __DIR__ . '/auth.php';
