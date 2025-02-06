<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\lapanganController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\RoleuserController;
use App\Http\Controllers\communityController;
use App\Http\Controllers\kabupatencontroller;
use App\Http\Controllers\agendaadminController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\lapanganadminController;
use App\Http\Controllers\penggunaadminController;
use App\Http\Controllers\komunitasadminController;
use App\Http\Controllers\landingpageadminController;
use App\Http\Controllers\landingpageafterloginController;

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
    return view('welcome');
});

Route::get('/login', [loginController:: class, 'login'])->name('login');
Route::post('/login', [loginController:: class, 'authenticate']);

// ADMIN

Route::middleware(['auth'])->group(function(){
   
Route::get('/landingpageadmin', [landingpageadminController:: class, 'landingpageadmin'])->name('landingpageadmin')->middleware('UserAkses:ADMIN');
Route::get('/lapanganadmin', [lapanganadminController:: class, 'lapanganadmin'])->name('lapanganadmin')->middleware('UserAkses:ADMIN');
// Route::get('/penggunaadmin', [penggunaadminController:: class, 'penggunaadmin'])->name('penggunaadmin')->middleware('UserAkses:ADMIN');
Route::get('/komunitasadmin', [komunitasadminController:: class, 'komunitasadmin'])->name('komunitasadmin')->middleware('UserAkses:ADMIN');
Route::delete('/Komunitas/{id}', [komunitasadminController::class,'destroy'])->name('komunitas.destroy')->middleware('UserAkses:ADMIN');


Route::get('/searchByProvincelapanganadmin', [lapanganadminController::class, 'index'])->name('searchByProvinceadmin')->middleware('UserAkses:ADMIN');
Route::post('/searchByProvincelapanganadmin', [lapanganadminController::class, 'searchByProvincelapanganadmin'])->name('searchByProvincelapanganadmin')->middleware('UserAkses:ADMIN');
Route::get('/searchBySportlapanganadmin', [lapanganadminController::class, 'index'])->name('searchBySportadmin')->middleware('UserAkses:ADMIN');
Route::post('/searchBySportlapanganadmin', [lapanganadminController::class, 'searchBySportlapanganadmin'])->name('searchBySportlapanganadmin')->middleware('UserAkses:ADMIN');

Route::get('/searchByProvincekomunitasadmin', [komunitasadminController::class, 'index'])->name('searchByProvinceadmin')->middleware('UserAkses:ADMIN');
Route::post('/searchByProvincekomunitasadmin', [komunitasadminController::class, 'searchByProvincekomunitasadmin'])->name('searchByProvincekomunitasadmin')->middleware('UserAkses:ADMIN');
Route::get('/searchBySportkomunitasadmin', [komunitasadminController::class, 'index'])->name('searchBySportadmin')->middleware('UserAkses:ADMIN');
Route::post('/searchBySportkomunitasadmin', [komunitasadminController::class, 'searchBySportkomunitasadmin'])->name('searchBySportkomunitasadmin')->middleware('UserAkses:ADMIN');

Route::get('/edit/{id}', [lapanganadminController::class, 'edit'])->name('admin.editform');
Route::put('/update/{id}', [lapanganadminController::class, 'update'])->name('update.form');
Route::delete('/lapangan/{id}', [lapanganadminController::class,'destroy'])->name('lapangan.destroy');

Route::get('/form/{provinsi_id}', [kabupatencontroller::class, 'getKabupaten1']);
Route::get('/form', [kabupatencontroller::class, 'index']);

Route::get('/profileadmin', [ProfilController::class, 'showadmin'])->name('profile.showadmin')->middleware('UserAkses:ADMIN');;
Route::get('/editprofileadmin', [profilController::class, 'editProfileadmin'])->middleware('auth')->name('profile.edit')->middleware('UserAkses:ADMIN');
Route::post('/update-profileadmin', [profilController::class, 'updateProfileadmin'])->middleware('auth')->name('profile.updateadmin')->middleware('UserAkses:ADMIN');

Route::get('/getKabupaten/{id_provinsi}', [kabupatenController::class, 'getKabupatenByProvinsi']);
Route::get('/getKabupatenn/{id_provinsi}', [kabupatenController::class, 'getKabupatenByProvinsi']);

Route::delete('/User/{id}', [RoleuserController::class,'destroy'])->name('user.destroy')->middleware('UserAkses:ADMIN');

Route::get('/datavip', [communityController::class, 'community'])->name('datavip')->middleware('UserAkses:ADMIN');

Route::patch('/user/{id}/updateToVIP', [komunitasadminController::class,'updateToVIP'])->name('user.updateToVIP')->middleware('UserAkses:ADMIN');
Route::patch('/user/{id}/updateToNVIP', [komunitasadminController::class,'updateToNVIP'])->name('user.updateToNVIP')->middleware('UserAkses:ADMIN');


});
Route::middleware(['auth', 'checkrole:ADMIN'])->group(function () {
    Route::get('/form', [lapanganadminController::class, 'form'])->name('form');
    Route::post('/form', [lapanganadminController::class, 'store'])->name('form');
});

// ADMIN SAMPAI SINI

//SELAIN ADMIN //

Route::get('/landingpageNVIP', [landingpageController:: class, 'landingpage'])->name('landingpageNVIP');
Route::get('/landingpageafterlogin', [landingpageafterloginController:: class, 'landingpageafterlogin'])->name('landingpageafterlogin')->middleware('auth');
Route::get('/community', [communityController:: class, 'community']);

Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/agenda', [agendaController:: class, 'index'])->name('agenda')->middleware('auth');
Route::post('/agenda', [agendaController:: class, 'index'])->name('agenda')->middleware('auth');

Route::middleware(['auth', 'checkrole:VIP'])->group(function () {
    Route::get('/formagenda', [agendaController::class, 'form'])->name('formagenda');
    Route::post('/formagenda', [agendaController::class, 'store'])->name('formagenda');
});


Route::get('/form/{provinsi_id}', [kabupatencontroller::class, 'getKabupaten1']);
Route::get('/formagenda', [kabupatencontroller::class, 'index123']);
Route::get('/getKabupatenuser/{id_provinsi}', [kabupatenController::class, 'getKabupatenByProvinsi123']);


Route::get('/searchByProvince', [AgendaController::class, 'index'])->name('searchByProvince')->middleware('auth');
Route::post('/searchByProvince', [AgendaController::class, 'searchByProvince'])->name('searchByProvince')->middleware('auth');
Route::get('/searchBySport', [AgendaController::class, 'index'])->name('searchBySport')->middleware('auth');
Route::post('/searchBySport', [AgendaController::class, 'searchBySport'])->name('searchBySport')->middleware('auth');


Route::get('/searchByProvincelapangan', [lapanganController::class, 'index'])->name('searchByProvincelapangan')->middleware('auth');
Route::post('/searchByProvincelapangan', [lapanganController::class, 'searchByProvincelapangan'])->name('searchByProvincelapangan')->middleware('auth');
Route::get('/searchBySportlapangan', [lapanganController::class, 'index'])->name('searchBySportlapangan')->middleware('auth');
Route::post('/searchBySportlapangan', [lapanganController::class, 'searchBySportlapangan'])->name('searchBySportlapangan')->middleware('auth');

Route::get('/register', [registerController:: class, 'showRegistration'])->name('register');
Route::post('/register', [registerController:: class, 'RegisterPost'])->name('register');

Route::get('/navbar', [agendaController:: class, 'navbar']);

Route::get('/lapangan', [lapanganController:: class, 'index'])->name('lapangan')->middleware('auth');
Route::post('/lapangan', [lapanganController:: class, 'index'])->name('lapangan')->middleware('auth');

Route::get('/profile', [profilController:: class, 'show'])->name('profile.show');
Route::get('/editprofile', [profilController::class, 'editProfile'])->middleware('auth')->name('profile.edit');
Route::post('/update-profile', [profilController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

Route::get('/a', [profilController:: class, 'show1'])->name('a');
Route::post('/roleuser/store', [RoleuserController::class, 'store'])->name('roleuser.store');

Route::get('/download-pdf', [PDFController::class, 'downloadPDF'])->name('downloadPDF');
Route::get('/download-pdfNVIP', [PDFController::class, 'downloadPDFNVIP'])->name('downloadPDFNVIP');
Route::get('/download-pdfVIP', [PDFController::class, 'downloadPDFVIP'])->name('downloadPDFVIP');

// SELAIN ADMIN SAMPAI SINI //

