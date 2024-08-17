<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\ProfileController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\WelcomeController;

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
route::get('/',[WelcomeController::class , 'index']);
Route::get('/', function () {
    return view('welcome');
});
route::get('/categories',[FrontendCategoryController::class , 'index'])->name('categories.index');
route::get('/categories/{category}',[FrontendCategoryController::class , 'show'])->name('categories.show');
route::get('/menus',[FrontendMenuController::class , 'index'])->name('menus.index');
route::get('/reservation/step-one',[FrontendReservationController::class ,'stepOne'])->name('reservations.step.one');
route::get('/reservation/step-two',[FrontendReservationController::class ,'stepTwo'])->name('reservations.step.two');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    route::get('/',[AdminController::class,'index'])->name('index');
        route::get('/',[CategoryController::class,'index'])->name('index');



    route::resource('/categories',CategoryController::class);
    route::resource('/menus',MenuController::class);
    route::resource('/tables',TableController::class);
    route::resource('/reservations',ReservationController::class);
    Route::get('admin/tables/{id}/edit', [TableController::class, 'edit'])->name('admin.tables.edit');
    Route::put('admin/tables/{id}', [TableController::class, 'update'])->name('admin.tables.update');
    Route::put('/admin/reservations/{id}', [ReservationController::class, 'update'])->name('admin.reservations.update');



});

require __DIR__.'/auth.php';