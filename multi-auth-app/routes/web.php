<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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



/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('/', [HomeController::class, 'homepage']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);


Route::get('/post_page', [AdminController::class, 'post_page']);
Route::post('/add_post', [AdminController::class, 'add_post']);
Route::get('/show_post', [AdminController::class, 'show_post']);
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
Route::get('/post_details/{id}', [HomeController::class, 'post_details']);

Route::get('/create_post', [HomeController::class, 'create_post'])->middleware(['auth']);
Route::post('/user_post', [HomeController::class, 'user_post'])->middleware(['auth']);
