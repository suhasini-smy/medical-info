<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetientController;

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

Route::get('/crm-login', function () {
    return view('users.login');
});


Route::any('/', function () {
    return redirect('crm-login');
});

/*Route::get('/dashboard', function ()
{
    return view('dashboard');
});*/

Route::get('/dashboard',[PetientController::class,'index']);

Route::get('/open-petient-form',[PetientController::class,'create']);
Route::post('/insert-petient-data',[PetientController::class,'store']);



