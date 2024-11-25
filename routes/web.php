<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   Route::resource('parameter', ParameterController::class);
   Route::post('modifier_parameter', [ParameterController::class, 'editParam'])->name('modifier_parameter');

   Route::resource('categories', CategoriesController::class);
   Route::get('modif_etat_categorie/{id}/{etat}', [CategoriesController::class, 'archive'])->name('modif_etat_categorie');
   Route::get('categories_archive', [CategoriesController::class, 'indexArchiv'])->name('categories_archive');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
