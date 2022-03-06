<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\isAdmin;
use App\Models\Controller;

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

Route::get('/', function() { $data = controller::whereIn('id', [1,2,3,4,5,6,7])->get(); return view('home', compact('data'));});
Route::get('/webinar', function() {$data = controller::whereIn('id', [11,12,13])->get(); return view('webinar1', compact('data'));});
Route::get('/login', [App\Http\Controllers\AuthAdminController::class, 'admin']);
Route::post('/check', [App\Http\Controllers\AuthAdminController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\AuthAdminController::class, 'logout']);
Route::get('/registrasi', [App\Http\Controllers\AuthAdminController::class, 'registrasi']);
Route::post('/register', [App\Http\Controllers\AuthAdminController::class, 'register']);
Route::get('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'getEmail']);
Route::post('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'postEmail']);
Route::get('/{token}/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'getPassword']);
Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'updatePassword']);
Route::get('/vote-poster', [App\Http\Controllers\PosterController::class, 'indexP']);
Route::get('/vote/{id}/{userId}', [App\Http\Controllers\PosterController::class, 'voting']);

Route::group(['middleware' => IsAdmin::class], function(){
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/admin/tutorial', [App\Http\Controllers\DashboardController::class, 'tutorial']);
Route::get('/admin/controllers/control', [App\Http\Controllers\DashboardController::class, 'controlView']);
Route::get('/admin/controllers/restriction', [App\Http\Controllers\DashboardController::class, 'restrict']);
Route::post('/admin/controllers/reset/{id}', [App\Http\Controllers\DashboardController::class, 'reset']);
Route::put('/admin/controllers/{id}', [App\Http\Controllers\DashboardController::class, 'controlEdit']);
Route::get('/admin/certificate/create1', [App\Http\Controllers\DashboardController::class, 'generateCertif1']);
Route::get('/admin/certificate/create2', [App\Http\Controllers\DashboardController::class, 'generateCertif2']);

	// participant
Route::get('/participants', [App\Http\Controllers\ParticipantController::class, 'index']);
Route::get('/participants/bayar', [App\Http\Controllers\ParticipantController::class, 'bayar']);
Route::get('/participants/bukti-pembayaran', [App\Http\Controllers\ParticipantController::class, 'bukti']);
Route::get('/participants/{participant}', [App\Http\Controllers\ParticipantController::class, 'show']);
Route::post('/confirm/{id}', [App\Http\Controllers\UserController::class, 'confirm']);
Route::post('/pass/{id}', [App\Http\Controllers\UserController::class, 'pass']);
Route::post('/reject/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
	
// Poster
Route::get('/poster', [App\Http\Controllers\PosterController::class, 'indexA']);
Route::get('/poster/hasil', [App\Http\Controllers\PosterController::class, 'indexB']);
Route::get('/poster/create', [App\Http\Controllers\PosterController::class, 'create']);
Route::post('/poster/store', [App\Http\Controllers\PosterController::class, 'store']);
Route::get('/poster/edit/{id}', [App\Http\Controllers\PosterController::class, 'edit']);
Route::put('/poster/edit/{id}', [App\Http\Controllers\PosterController::class, 'update']);
Route::delete('/poster/delete/{id}', [App\Http\Controllers\PosterController::class, 'destroy']);

	// ujian
Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::get('/test/active/{id}', [App\Http\Controllers\TestController::class, 'active']);
Route::get('/test/create', [App\Http\Controllers\TestController::class, 'create']);
Route::post('/test/store', [App\Http\Controllers\TestController::class, 'store']);
Route::get('/test/data', [App\Http\Controllers\TestController::class, 'show']);
Route::get('/test/result', [App\Http\Controllers\TestController::class, 'result']);
Route::get('/test/result/{id}', [App\Http\Controllers\TestController::class, 'indexR']);
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'edit']);
Route::delete('/test/{id}', [App\Http\Controllers\TestController::class, 'destroy']);
Route::put('/test/{id}', [App\Http\Controllers\TestController::class, 'update']);
Route::get('/result/print/{id}', [App\Http\Controllers\TestController::class, 'print']);

	// quiziz
Route::get('/quiziz/{id}', [App\Http\Controllers\QuizizController::class, 'hasil']);
Route::get('/quiziz', [App\Http\Controllers\QuizizController::class, 'index']);

	// soal
Route::get('/soal/create', [App\Http\Controllers\QuestionController::class, 'create']);
Route::post('/soal/store', [App\Http\Controllers\QuestionController::class, 'store']);
Route::get('/soal/{soal}', [App\Http\Controllers\QuestionController::class, 'index']);
Route::get('/soal/edit/{soal}', [App\Http\Controllers\QuestionController::class, 'edit']);
Route::delete('/soal/{soal}', [App\Http\Controllers\QuestionController::class, 'destroy']);
Route::put('/soal/{id}', [App\Http\Controllers\QuestionController::class, 'update']);


});
Route::group(['middleware' => 'auth'], function(){
// user
Route::get('/home/identitas', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/home/identitas-peserta', [App\Http\Controllers\UserController::class, 'index2']);
Route::get('/home/pembayaran', [App\Http\Controllers\ParticipantController::class, 'pembayaran']);
Route::get('/home/identitas/{id}', [App\Http\Controllers\ParticipantController::class, 'show']);
Route::get('/home/kartu-peserta/{id}', [App\Http\Controllers\UserController::class, 'printCard']);
Route::post('/home/check/{id}', [App\Http\Controllers\ParticipantController::class, 'data']);
Route::post('/home/edit/{id}', [App\Http\Controllers\ParticipantController::class, 'edit']);
Route::post('/home/{participant}', [App\Http\Controllers\ParticipantController::class, 'store']);
Route::post('/home/upload/{id}', [App\Http\Controllers\ParticipantController::class, 'uploadBukti']);

// user-test
Route::get('/exam', [App\Http\Controllers\ExamController::class, 'index']);
Route::put('/exam/store/{id}', [App\Http\Controllers\ExamController::class, 'store']);
Route::post('/exams/{id}', [App\Http\Controllers\ExamController::class, 'preShow']);
Route::post('/exam/{data}', [App\Http\Controllers\ExamController::class, 'show']);
Route::get('/exam/delete/{nomor}', [App\Http\Controllers\ExamController::class, 'show']);
Route::get('/upload-karya', function() {return view('user.karya');});
});

Route::get('/print', [App\Http\Controllers\UserController::class, 'test']);