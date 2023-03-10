<?php

  use App\Http\Controllers\ProfileController;
  use Illuminate\Foundation\Application;
  use Illuminate\Support\Facades\Route;
  use Inertia\Inertia;

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

  Route::get('/laravel', function () {
    return Inertia::render('Welcome', [
      'canLogin' => Route::has('login'),
      'canRegister' => Route::has('register'),
      'laravelVersion' => Application::VERSION,
      'phpVersion' => PHP_VERSION,
    ]);
  });

  Route::get('/',[\App\Http\Controllers\ProductController::class, 'index'])->name('index');

  Route::resource('products', \App\Http\Controllers\ProductController::class)
    ->only(['index', 'store', 'update']);

  Route::get('product/{id}', function ($id) {
    return Inertia::render('Store/ProductPage', [
      'product' => \App\Models\Product::find($id),
    ]);
  })->name('product.show');

  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->middleware(['auth', 'verified'])->name('dashboard');

  Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('product.to_cart');
  Route::get('getCart',[\App\Http\Controllers\ProductController::class, 'getCart'])->name('get_cart');
  Route::get('delete-from-cart/{id}',[\App\Http\Controllers\ProductController::class, 'deleteFromCart'])->name('product.delete_from_cart');

  Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  });

  require __DIR__ . '/auth.php';
