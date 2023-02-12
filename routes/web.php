<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\SandraController;
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

/*
Route::get('/','PagesController@home' );

Route::get('/about','PagesController@about' );

Route::get('/services', 'PagesController@services(Coulibaly)');

*/

Route::get('/', [PagesController::class, 'home']);

Route::get('/about', [PagesController::class, 'about']);
Route::get('/services/{name}', [PagesController::class, 'services']);
Route::get('/details/{id}', [PagesController::class, 'details']);

Route::get('/create', [ProductController::class, 'create']);
Route::post('/saveProduct', [ProductController::class, 'saveProduct']);

Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/updateProduct', [ProductController::class, 'updateProduct']);





Route::get('/delete/{id}', [ProductController::class, 'delete']);

//Route::resource('user', UserController::class);

Route::resource('/courses', SandraController::class);