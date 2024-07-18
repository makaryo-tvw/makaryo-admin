<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
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
    return abort(404);
});

Route::get("/kulonuwon" , [AuthController::class, "index"])->name("login");
Route::post("/kulonuwon" , [AuthController::class, "store"])->name("login.store");
Route::delete("/kulonuwon" , [AuthController::class, "logout"])->name("logout");


Route::middleware(["auth:owner"])->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");

    Route::get("/company", [CompanyController::class, "index"])->name("company.index");

    Route::resource("/setting/users", OwnerController::class);
});