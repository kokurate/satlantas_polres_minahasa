<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/',[HomeController::class,'index'])->name('home.index');

    // Login
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'authenticate'])->name('authenticate');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    

    // Informasi
    Route::get('/informasi',[HomeController::class,'informasi'])->name('home.informasi');
    Route::get('/informasi/detail/{information:slug}',[HomeController::class,'informasi_detail'])->name('home.informasi.detail');

    // Feedback
    Route::get('/feedback',[HomeController::class,'feedback'])->name('home.feedback');
    Route::get('/feedback-register',[HomeController::class,'register_feedback'])->name('home.feedback.register');
    Route::post('/feedback-register',[HomeController::class,'register_feedback_store'])->name('home.feedback.register.store');

    Route::get('/feedback/create/{feedback:token}',[HomeController::class,'create_feedback'])->name('home.feedback.create');
    Route::post('/feedback/create/{feedback:token}',[HomeController::class,'create_feedback_store'])->name('home.feedback.create.store');

    Route::get('feedback/{feedback:token}', [HomeController::class,'feedback_detail'])->name('home.feedback.detail');


    // Kritik dan Saran
   
    Route::get('/kritik-saran',[HomeController::class,'kritik_saran'])->name('home.kritik_saran');
    Route::post('/kritik-saran/store',[HomeController::class,'kritik_saran_store'])->name('home.kritik_saran.store');



    // Admin ===========================================================
    Route::group(['middleware' => ['auth']], (function (){
   
        Route::get('register',[AuthController::class,'register'])->name('register');
        Route::post('register',[AuthController::class,'register_store'])->name('register.store');

        Route::get('admin', [AdminController::class,'index'])->name('admin.index');

        // Feedback
        Route::get('admin/feedback/detail/{feedback:token}',[AdminController::class,'feedback_detail'])->name('admin.feedback.detail');
        Route::delete('admin/feedback/destroy/{feedback:token}',[AdminController::class,'feedback_destroy'])->name('admin.feedback.destroy');


        // create informasi
        Route::get('admin/informasi/create', [AdminController::class,'informasi_create'])->name('admin.informasi.create');
        Route::post('admin/informasi/create', [AdminController::class,'informasi_store'])->name('admin.informasi.store');

        //  informasi
        Route::get('admin/informasi/update/{information:slug}', [AdminController::class,'informasi_update'])->name('admin.informasi.update');
        Route::post('admin/informasi/update/{information:slug}', [AdminController::class,'informasi_update_store'])->name('admin.informasi.update.store');
        Route::delete('/admin/informasi/destroy/{information:slug}',[AdminController::class,'informasi_destroy'])->name('admin.informasi.destroy');

        // Kritik dan Saran
        Route::get('admin/kritik-saran/{kritik_saran:slug}',[AdminController::class,'kritik_saran_detail'])->name('admin.kritik_saran.detail');
        Route::delete('admin/kritik-saran/{kritik_saran:slug}/destroy', [AdminController::class, 'kritik_saran_destroy'])->name('admin.kritik_saran.destroy');
        
        
        // Route::post('/kritik-saran/update',[HomeController::class,'kritik_saran_store'])->name('home.kritik_saran.store');

    }));

    // Slug
    Route::get('/admin/informasi/checkSlugInformation',[AdminController::class,'checkSlugInformation']);
    Route::get('/kritik-saran/checkSlugKritikSaran',[HomeController::class,'checkSlugKritikSaran']);
