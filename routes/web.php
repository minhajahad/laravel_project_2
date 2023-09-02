<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/backend/logout', [BackendController::class, 'destroy'])->name('backend.logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);

    Route::get('product/active/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

    Route::get('product/Inactive/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
});

Route::resource('sliders', SliderController::class);
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('backend.home');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});

Route::get('excel', function () {
    return view('excel');
});

Route::get('export-user', [UserController::class, 'exportUser'])->name('export-user');

Route::post('import-user', [UserController::class, 'importUser'])->name('import-user');




Route::get('google/login', [LoginController::class, 'provider'])->name('google.login');
Route::get('google/callback', [LoginController::class, 'callbackHandle'])->name('google.login.callback');

Route::get('employee/create', [EmployeeController::class, 'create']);

require __DIR__ . '/auth.php';
