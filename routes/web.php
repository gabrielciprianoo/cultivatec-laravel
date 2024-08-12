<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StandardController;
use App\Models\Fruit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $fruits = Fruit::all();
    return view('main', ['fruits' => $fruits]);
})->name('index');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store');
    Route::get('/logout', 'destroy')->name('logout');
});


Route::middleware('auth')->controller(FruitController::class)->group(function () {
    Route::get('/admin/fruits', 'index')->name('fruit.index');
    Route::get('/admin/fruit', 'create')->name('fruit.create');
    Route::get('/admin/{fruit:name}/edit', 'edit')->name('fruit.edit');
    Route::put('/admin/{fruit}/update', 'update')->name('fruit.update');
    Route::delete('/admin/{fruit:name}/delete', 'destroy')->name('fruit.delete');
    Route::post('/admin/fruit/create', 'store')->name('fruit.store');
});
Route::get('/admin/{fruit:name}', [FruitController::class, 'show'])->name('fruit.show');

Route::middleware('auth')->controller(StandardController::class)->group(function () {
    Route::get('/admin/standards/{fruit:name}', 'index')->name('standards.index');
    Route::get('/admin/standards/{fruit:name}/create', 'create')->name('standards.create');
    Route::post('/admin/standards/{fruit:name}/store', 'store')->name('standards.store');
    Route::get('/admin/standards/{fruit:name}/{standard:short_name}/edit', 'edit')->name('standards.edit');
    Route::put('/admin/standards/{fruit:name}/{standard:short_name}/update', 'update')->name('standards.update');
    Route::delete('/admin/standards/{standard:short_name}/{fruit}/delete', 'destroy')->name('standards.delete');
});
