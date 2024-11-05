<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () { return view('welcome');});
Route::get('/', [HomeController::class, 'index']);
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/addCategory', [AdminController::class, 'addCategory']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/add_product', [AdminController::class, 'add_product']);
Route::post('/saveProduct', [AdminController::class, 'saveProduct']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/remove_product/{id}', [AdminController::class, 'remove_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('dashboard', [HomeController::class, 'redirect'])->name('dashboard');
});

require __DIR__ . '/auth.php';
