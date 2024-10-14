<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('client.index');
// });
Route::get('/',  [ProductController::class, 'index'])->name('client.index');
Route::get('/detail/{id}',  [ProductController::class, 'detail'])->name('client.detail');
Route::get('/category/{id}',  [ProductController::class, 'category'])->name('client.category');
Route::get('/search',  [ProductController::class, 'search'])->name('client.search');




Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('admin/',  [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/products',  [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::post('products/create', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/create', [AdminProductController::class,  'create'])->name('admin.products.create');
    Route::get('products/{product}', [AdminProductController::class,  'show'])->name('admin.products.show');
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{product}/edit', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{product}/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');



    Route::get('admin/categories',  [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('admin/categories/create', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('admin/categories/create', [AdminCategoryController::class,  'create'])->name('admin.categories.create');

    Route::get('admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('admin/categories/{category}/edit', [AdminCategoryController::class, 'update'])->name('admin.categories.update');




    Route::get('admin/users',  [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('admin/users/create', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/create', [AdminUserController::class,  'create'])->name('admin.users.create');
    Route::get('admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}/edit', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}/delete', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
