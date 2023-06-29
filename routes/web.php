<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('contacts', ContactController::class);
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('contacts/index', [ContactController::class, 'index'])->name('contacts.index');
Route::get('contacts/search', [ContactController::class, 'search'])->name('contacts.search');
Route::get('contacts/search/{searchTerm}', [ContactController::class, 'search'])->name('contacts.search');
Route::post('contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::post('contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');