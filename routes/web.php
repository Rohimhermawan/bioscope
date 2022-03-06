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

Route::get('/', function() { $data = controller::whereIn('id', [1,9,14,17,2,19])->get(); return view('home', compact('data'));})->name('home');
Route::get('/webinar', function() {$data = controller::whereIn('id', [11,12,13])->get(); return view('webinar1', compact('data'));})->name('webinar');
Route::get('/login', [App\Http\Controllers\AuthAdminController::class, 'admin'])->name('login');
Route::post('/check', [App\Http\Controllers\AuthAdminController::class, 'login'])->name('check');
Route::get('/logout', [App\Http\Controllers\AuthAdminController::class, 'logout'])->name('logout');
Route::get('/registrasi', [App\Http\Controllers\AuthAdminController::class, 'registrasi'])->name('registrasi');
Route::post('/register', [App\Http\Controllers\AuthAdminController::class, 'register'])->name('register');
Route::get('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'postEmail'])->name('forget');
Route::get('/{token}/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'getPassword'])->name('reset-password');
Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'updatePassword'])->name('reset');
Route::get('/vote-poster', [App\Http\Controllers\PosterController::class, 'indexP'])->name('voting-poster');
Route::get('/vote/{id}/{userId}', [App\Http\Controllers\PosterController::class, 'voting'])->name('voting-poster');

Route::group(['middleware' => IsAdmin::class], function(){
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/tutorial', [App\Http\Controllers\DashboardController::class, 'tutorial'])->name('tutorial');
Route::get('/admin/controllers/control', [App\Http\Controllers\DashboardController::class, 'controlView'])->name('controlMenu');
Route::get('/admin/controllers/restriction', [App\Http\Controllers\DashboardController::class, 'restrict'])->name('controlMenu');
Route::post('/admin/controllers/reset/{id}', [App\Http\Controllers\DashboardController::class, 'reset'])->name('controlMenu');
Route::put('/admin/controllers/{id}', [App\Http\Controllers\DashboardController::class, 'controlEdit'])->name('controlMenu');
Route::get('/admin/certificate/create1', [App\Http\Controllers\DashboardController::class, 'generateCertif1'])->name('certificateGenerator1');
Route::get('/admin/certificate/create2', [App\Http\Controllers\DashboardController::class, 'generateCertif2'])->name('certificateGenerator2');

	// participant
Route::get('/participants', [App\Http\Controllers\ParticipantController::class, 'index'])->name('data-peserta');
Route::get('/participants/bayar', [App\Http\Controllers\ParticipantController::class, 'bayar'])->name('data-bayar');
Route::get('/participants/bukti-pembayaran', [App\Http\Controllers\ParticipantController::class, 'bukti'])->name('participant-pay');
Route::get('/participants/{participant}', [App\Http\Controllers\ParticipantController::class, 'show'])->name('participant-show');
Route::post('/confirm/{id}', [App\Http\Controllers\UserController::class, 'confirm'])->name('participant-confirm');
Route::post('/pass/{id}', [App\Http\Controllers\UserController::class, 'pass'])->name('participant-pass');
Route::post('/reject/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('participant-delete');
	
// Poster
Route::get('/poster', [App\Http\Controllers\PosterController::class, 'indexA'])->name('data-poster');
Route::get('/poster/hasil', [App\Http\Controllers\PosterController::class, 'indexB'])->name('hasil-poster');
Route::get('/poster/create', [App\Http\Controllers\PosterController::class, 'create'])->name('Poster-create');
Route::post('/poster/store', [App\Http\Controllers\PosterController::class, 'store'])->name('Poster-store');
Route::get('/poster/edit/{id}', [App\Http\Controllers\PosterController::class, 'edit'])->name('Poster-edit');
Route::put('/poster/edit/{id}', [App\Http\Controllers\PosterController::class, 'update'])->name('Poster-update');
Route::delete('/poster/delete/{id}', [App\Http\Controllers\PosterController::class, 'destroy'])->name('Poster-delete');

	// ujian
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::get('/test/active/{id}', [App\Http\Controllers\TestController::class, 'active'])->name('test-active');
Route::get('/test/create', [App\Http\Controllers\TestController::class, 'create'])->name('test-create');
Route::post('/test/store', [App\Http\Controllers\TestController::class, 'store'])->name('test-store');
Route::get('/test/data', [App\Http\Controllers\TestController::class, 'show'])->name('test-show');
Route::get('/test/result', [App\Http\Controllers\TestController::class, 'result'])->name('result');
Route::get('/test/result/{id}', [App\Http\Controllers\TestController::class, 'indexR'])->name('test-result');
Route::get('/test/{id}', [App\Http\Controllers\TestController::class, 'edit'])->name('test-edit');
Route::delete('/test/{id}', [App\Http\Controllers\TestController::class, 'destroy'])->name('test-destroy');
Route::put('/test/{id}', [App\Http\Controllers\TestController::class, 'update'])->name('test-update');
Route::get('/result/print/{id}', [App\Http\Controllers\TestController::class, 'print'])->name('test-print');

	// quiziz
Route::get('/quiziz/{id}', [App\Http\Controllers\QuizizController::class, 'hasil'])->name('quiziz-result');
Route::get('/quiziz', [App\Http\Controllers\QuizizController::class, 'index'])->name('quiziz');

	// soal
Route::get('/soal/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('soal-create');
Route::post('/soal/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('soal-store');
Route::get('/soal/{soal}', [App\Http\Controllers\QuestionController::class, 'index'])->name('soal');
Route::get('/soal/edit/{soal}', [App\Http\Controllers\QuestionController::class, 'edit'])->name('soal-edit');
Route::delete('/soal/{soal}', [App\Http\Controllers\QuestionController::class, 'destroy'])->name('soal-delete');
Route::put('/soal/{id}', [App\Http\Controllers\QuestionController::class, 'update'])->name('soal-update');


});
Route::group(['middleware' => 'auth'], function(){
// user
Route::get('/home/identitas', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::get('/home/identitas-peserta', [App\Http\Controllers\UserController::class, 'index2'])->name('identitas');
Route::get('/home/pembayaran', [App\Http\Controllers\ParticipantController::class, 'pembayaran'])->name('pembayaran');
Route::get('/home/identitas/{id}', [App\Http\Controllers\ParticipantController::class, 'show'])->name('home');
Route::get('/home/kartu-peserta/{id}', [App\Http\Controllers\UserController::class, 'printCard'])->name('kartu-peserta');
Route::post('/home/check/{id}', [App\Http\Controllers\ParticipantController::class, 'data'])->name('upload-data');
Route::post('/home/edit/{id}', [App\Http\Controllers\ParticipantController::class, 'edit'])->name('edit-data');
Route::post('/home/{participant}', [App\Http\Controllers\ParticipantController::class, 'store'])->name('upload-data');
Route::post('/home/upload/{id}', [App\Http\Controllers\ParticipantController::class, 'uploadBukti'])->name('upload-pembayaran');

// user-test
Route::get('/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('user-test');
Route::put('/exam/store/{id}', [App\Http\Controllers\ExamController::class, 'store'])->name('save-exam');
Route::post('/exams/{id}', [App\Http\Controllers\ExamController::class, 'preShow'])->name('user-exam');
Route::post('/exam/{data}', [App\Http\Controllers\ExamController::class, 'show'])->name('user-exam');
Route::get('/exam/delete/{nomor}', [App\Http\Controllers\ExamController::class, 'show'])->name('user-exam');
Route::get('/upload-karya', function() {return view('user.karya');})->name('upload-karya');
});

Route::get('/print', [App\Http\Controllers\UserController::class, 'test'])->name('user-exam');