<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
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

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get("/biens", [\App\Http\Controllers\PropertyController::class, 'index'])->name("property.index");
Route::get("/biens/{slug}-{property}", [\App\Http\Controllers\PropertyController::class, 'show'])->where(
    [
        "property" => $idRegex,
        "slug" => $slugRegex
    ]
)->name("property.show");

Route::prefix("admin")->name("admin.")->group(function () {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(["show"]);
    Route::resource('option', OptionController::class)->except(["show"]);
});