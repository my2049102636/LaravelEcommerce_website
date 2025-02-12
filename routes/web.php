<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);


Route::get('/dashboard',[HomeController::class,'login_home'])
->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/mycart',[HomeController::class,'mycart'])
->middleware(['auth', 'verified']);
Route::post('/confirm_order',[HomeController::class,'confirm_order'])
->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware([
    'auth','admin'
]);

Route::get('add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->middleware('auth');


Route::get('product_detail/{id}', [HomeController::class, 'product_detail']);
Route::get('view_category',[AdminController::class,'category'])->middleware([
    'auth','admin'
]);


Route::post('add_category',[AdminController::class,'add_category'])->middleware([
    'auth','admin'
]);
Route::get('animation',[AdminController::class,'animation'])->middleware([
    'auth','admin'
]);
Route::get('order',[AdminController::class,'order'])->middleware([
    'auth','admin'
]);

Route::get('allcategory',[AdminController::class,'allcategory'])->middleware([
    'auth','admin'
]);

Route::get('delete_data/{id}',[AdminController::class,'delete_data'])->middleware([
    'auth','admin'
]);


Route::get('edit_data/{id}',[AdminController::class,'edit_data'])->middleware([
    'auth','admin'
]);

Route::post('update/{id}',[AdminController::class,'update'])->middleware([
    'auth','admin'
]);

Route::get('product',[AdminController::class,'product'])->middleware([
    'auth','admin'
]);
Route::get('show_product',[AdminController::class,'show_product'])->middleware([
    'auth','admin'
]);


Route::post('Add_product',[AdminController::class,'Add_product'])->middleware([
    'auth','admin'
]);
Route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware([
    'auth','admin'
]);

Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware([
    'auth','admin'
]);

Route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware([
    'auth','admin'
]);

Route::get('search_product',[AdminController::class,'search_product'])->middleware([
    'auth','admin'
]);
Route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware([
    'auth','admin'
]);

Route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware([
    'auth','admin'
]);
Route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware([
    'auth','admin'
]);



