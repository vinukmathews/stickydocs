<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;

use Illuminate\Support\Facades\Hash;
use App\Models\Question;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/client-login', [LoginController::class,'getClientLogin']);
Route::get('/client/{hash}', [UploadController::class,'getUploadDocument']);
Route::post('/client/{hash}', [UploadController::class,'postUploadDocument']);

Route::get('/download-file/{id}', [UploadController::class,'getDownload']);

Route::group(["middleware" => "guest"], function () {
    Route::get('/', [LoginController::class,'getLogin']);
    Route::post('/', [LoginController::class,'postLogin']);
});
///// ADMIN ROUTES

Route::prefix("admin")->group(function () {
    Route::group(["middleware" => "admin"], function () {
    Route::get('/logout', [LoginController::class,'getLogout']);
    Route::get('/admin-dashboard', [AdminController::class,'getAdminDashboard']);
    Route::get('/new-link', [AdminController::class,'getNewLink']);
    Route::post('/new-link', [AdminController::class,'postNewLink']);

    Route::post('/save-document-request', [AdminController::class,'postSaveDocumentRequest']);

    Route::get('/document-request/{id}', [AdminController::class,'getDocumentRequest']);
    });
    
});

Route::get('/testing',function(){
  $question = Question::find(22);
  return $question->ans->id;
});



