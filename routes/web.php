<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\PropertyController as PropertyControllerFront;
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
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get("/biens", [PropertyControllerFront::class, 'index'])->name("property.index");
Route::get("/biens/{slug}-{property}", [PropertyControllerFront::class, 'show'])->name("property.show")->where(
    [
        "property" => $idRegex,
        "slug" => $slugRegex
    ]
);
Route::post('/biens/{property}/contact', [PropertyControllerFront::class, 'contact'])->name('property.contact')->where([
    "property" => $idRegex
]);

Route::prefix("admin")->name("admin.")->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except(["show"]);
    Route::resource('option', OptionController::class)->except(["show"]);
});