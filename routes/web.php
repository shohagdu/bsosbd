<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BkashController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/registration', [HomeController::class, 'registration']);
Route::get('/Breastbdcon2024', [HomeController::class, 'Breastbdcon2024']);
Route::get('/internationalFaculty', [HomeController::class, 'internationalFaculty']);
Route::post('/updateWorkshopPaymentInfo', [HomeController::class, 'store']);
Route::get('/registrationSuccess/{id}', [HomeController::class, 'registrationSuccess']);

// Checkout (URL) User Part
Route::get('/bkash-pay', [BkashController::class, 'payment'])->name('url-pay');
Route::post('/bkash-create', [BkashController::class, 'createPayment'])->name('url-create');
Route::get('/bkash-callback', [BkashController::class, 'callback'])->name('url-callback');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/updateFacultyMember/{id}', [AdminController::class, 'updateFacultyMember'])->name('updateFacultyMember');
    Route::post('/updatedStoreFacultyMember', [AdminController::class, 'updatedStoreFacultyMember'])->name('updatedStoreFacultyMember');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/workshopApplicant', [HomeController::class, 'workshopApplicant'])->name('workshopApplicant');
    Route::get('/facultyMember', [HomeController::class, 'facultyMember'])->name('facultyMember');
});

require __DIR__.'/auth.php';
