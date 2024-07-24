<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;

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
    return view('layouts.main');
});

// Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// User

Route::get('/user', [UserController::class, 'users'])->name('user');
Route::get('/user/create',[UserController::class,'userCreate'])->name('create.user');
Route::post('/user/insert',[UserController::class,'userInsert'])->name('insert.user');
Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('edit.user');
Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
Route::get('/user/destroy/{id}',[UserController::class,'userDestroy'])->name('destroy.user');

// Category

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');
Route::get('/category/destroy/{id}',[CategoryController::class,'categoryDestroy'])->name('destroy.category');

// Pet

Route::get('/pet', [PetController::class, 'pet'])->name('pet');
Route::get('/pet/create', [PetController::class, 'createPet'])->name('pet.create');
Route::post('/pet/store', [PetController::class, 'storePet'])->name('pet.store');
Route::get('/pet/edit/{id}', [PetController::class, 'PetEdit'])->name('edit.pet');
Route::post('/pet/update/{id}', [PetController::class, 'PetUpdate'])->name('update.pet');
Route::get('/pet/destroy/{id}',[PetController::class,'PetDestroy'])->name('destroy.pet');