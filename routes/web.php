<?php

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

Route::middleware(['auth','web'])->group(function(){
    Route::get('/', function(){ 
        return redirect()->action('DashboardController@index'); 
    }); 
});
 // Password Reset Routes...
 Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
 Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
 Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 
Route::group(['middleware' => ['auth']], function() {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // bikin link ke controller profile controller
    Route::get('profile', 'ProfileController@index')->name('profile');
    
 // Registration Routes...s
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 Route::post('register', 'Auth\RegisterController@register');
 
 
 Route::group(['prefix' => 'kategoris'], function () {
    Route::get('/', 'KategorisController@index');
    Route::match(['get'], 'listrealtime', 'KategorisControlle[r@listkategori');   
    Route::match(['get', 'post'], 'create', 'KategorisController@create');
    Route::match(['get', 'put'], 'update/{id_kategori}', 'KategorisController@update');
    Route::match(['get', 'put'], 'show/{id_kategori}', 'KategorisController@show');
    Route::delete('delete/{id}', 'KategorisController@delete');
 });

 Route::get('api/getbarang','PeminjamanbarangController@getBarang');

 Route::group(['prefix' => 'departemens'], function () {
    Route::get('/', 'DepartemenController@index');
    Route::match(['get'], 'listdepartemen', 'DepartemenController@listdepartemen');   
    Route::match(['get', 'post'], 'create', 'DepartemenController@create');
    Route::match(['get', 'put'], 'update/{id}', 'DepartemenController@update');
    Route::match(['get', 'put'], 'show/{id}', 'DepartemenController@show');
    Route::delete('delete/{id}', 'DepartemenController@delete');
 });

 Route::group(['prefix' => 'peminjamanbarang'], function () {
    Route::get('/', 'PeminjamanbarangController@index');
    Route::match(['get'], 'listpeminjaman', 'PeminjamanbarangController@listpengajuan');   
    Route::match(['get', 'post'], 'create', 'PeminjamanbarangController@create');
    Route::match(['get', 'put'], 'update/{no_pinjam}', 'PeminjamanbarangController@update');
    Route::match(['get', 'put'], 'show/{no_pinjam}', 'PeminjamanbarangController@show');
    Route::delete('delete/{no_pinjam}', 'PeminjamanbarangController@delete');
 });
 // Report barang
 Route::get('import-export-view', 'ExcelpegawaiController@importExportView')->name('import.export.view');
 Route::post('import-file', 'ExcelpegawaiController@importFile')->name('import.file');
 Route::get('export-file/{type}', 'ExcelpegawaiController@exportFile')->name('export.file');
 Route::get('export-file2/{type}', 'ExcelpegawaiController@exportFile2')->name('export2.file');
 Route::get('export-file3/{type}', 'ExcelpegawaiController@exportFile3')->name('export3.file');

  // Report barang
  Route::get('import-export-view', 'ExcelpeminjamanController@importExportView')->name('import.export.view');
  Route::post('import-file', 'ExcelpeminjamanController@importFile')->name('import.file');
  Route::get('export-file/{type}', 'ExcelpeminjamanController@exportFile')->name('export.file');
  Route::get('export-file2/{type}', 'Excelpeminjamanontroller@exportFile2')->name('export2.file');
  Route::get('export-file3/{type}', 'ExcelpeminjamanController@exportFile3')->name('export3.file');

   // Report barang
 Route::get('import-export-view', 'ExcelsupplierController@importExportView')->name('import.export.view');
 Route::post('import-file', 'ExcelsupplierController@importFile')->name('import.file');
 Route::get('export-file/{type}', 'ExcelsupplierController@exportFile')->name('export.file');
 Route::get('export-file2/{type}', 'ExcelsupplierController@exportFile2')->name('export2.file');
 Route::get('export-file3/{type}', 'ExcelsupplierController@exportFile3')->name('export3.file');

  // Report barang
  Route::get('import-export-view', 'ExcelstokController@importExportView')->name('import.export.view');
  Route::post('import-file', 'ExcelstokController@importFile')->name('import.file');
  Route::get('export-file/{type}', 'ExcelstokController@exportFile')->name('export.file');
  Route::get('export-file2/{type}', 'ExcelstokController@exportFile2')->name('export2.file');
  Route::get('export-file3/{type}', 'ExcelstokController@exportFile3')->name('export3.file');

 Route::group(['prefix' => 'pengembalianbarang'], function () {
    Route::get('/', 'PengembalianbarangController@index');
    Route::match(['get'], 'listpengembalian', 'PengembalianbarangController@listpermintaan');   
    Route::match(['get', 'post'], 'create', 'PengembalianbarangController@create');
    Route::match(['get', 'put'], 'update/{id}', 'PengembalianbarangController@update');
    Route::match(['get', 'put'], 'show/{id}', 'PengembalianbarangController@show');
    // Route::delete('delete/{id}', 'PengembalianController@delete');
 });


 Route::group(['prefix' => 'pegawais'], function () {
    Route::get('/', 'PegawaisController@index');
    Route::match(['get'], 'listpegawai', 'PegawaisController@listpegawai');   
    Route::match(['get', 'post'], 'create', 'PegawaisController@create');
    Route::match(['get', 'put'], 'update/{nip}', 'PegawaisController@update');
    Route::match(['get', 'put'], 'show/{nip}', 'PegawaisController@show');
    Route::delete('delete/{id}', 'PegawaisController@delete');
 });
 Route::group(['prefix' => 'posisitions'], function () {
    Route::get('/', 'PosisitionsController@index');
    Route::match(['get'], 'listposisitions', 'PosisitionsController@listposisitions');   
    Route::match(['get', 'post'], 'create', 'PosisitionsController@create');
    Route::match(['get', 'put'], 'update/{id_posisitions}', 'PosisitionsController@update');
    Route::match(['get', 'put'], 'show/{id_posisitions}', 'PosisitionsController@show');
    Route::delete('delete/{id_posisitions}', 'PosisitionsController@delete');
 });
 Route::group(['prefix' => 'user'], function () {
     Route::get('/', 'UserController@index');  
     Route::match(['get', 'post'], 'create', 'UserController@create');
     Route::match(['get', 'put'], 'update/{id}', 'UserController@update');
     Route::match(['get', 'put'], 'show/{id}', 'UserController@show');
     Route::match(['get', 'put'], 'reset/{id}', 'UserController@reset');
     Route::delete('delete/{id}', 'UserController@delete');
  });
  Route::group(['prefix' => 'barang'], function () {
    Route::get('/', 'BarangController@index');
    Route::match(['get','post'], 'create', 'BarangController@create');
    Route::match(['get', 'put'], 'update/{id_barang}', 'BarangController@update');
    Route::match(['get'], 'show/{id_barang}', 'BarangController@show');
 });
 Route::group(['prefix' => 'barangrusak'], function () {
    Route::get('/', 'BarangrusakController@index');
    Route::match(['get', 'put'], 'update/{id_barang}', 'BarangrusakController@update');
    Route::match(['get'], 'show/{id_barang}', 'BarangrusakController@show');
 });
 Route::group(['prefix' => 'sumberdana'], function () {
    Route::get('/', 'SumberdanaController@index');
    Route::match(['get','post'], 'create', 'SumberdanaController@create');
    Route::match(['get', 'put'], 'update/{id_sumber_dana}', 'SumberdanaController@update');
    Route::match(['get'], 'show/{id}', 'SumberdanaController@show');
 });
 Route::group(['prefix' => 'barangmasuk'], function () {
     Route::get('/', 'BarangmasukController@index');
     Route::get('/info/{kode_barang}', 'BarangmasukController@getinfo');
     Route::match(['get','post'], 'create', 'BarangmasukController@create');
     Route::match(['get', 'put'], 'update/{id_masuk_barang}', 'BarangmasukController@update');
     Route::match(['get', 'put'], 'show/{id_masuk_barang}', 'BarangmasukController@show');
    //  Route::delete('delete/{id_masuk_}', 'UserController@delete');
 });
 Route::group(['prefix' => 'barangkeluar'], function () {
    Route::get('/', 'BarangkeluarController@index');
    Route::match(['get','post'], 'create', 'BarangkeluarController@create');
    Route::match(['get', 'put'], 'update/{id_barang_keluar}', 'BarangmasukController@update');
    Route::match(['get', 'put'], 'show/{id_masuk_barang}', 'BarangmasukController@show');
    // Route::delete('delete/{id}', 'UserController@delete');
});
Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', 'SuppliersController@index');
    Route::match(['get','post'], 'create', 'SuppliersController@create');
    Route::match(['get', 'put'], 'update/{kode_supplier}', 'SuppliersController@update');
    Route::match(['get', 'put'], 'show/{kode_supplier}', 'SuppliersController@show');
   //  Route::delete('delete/{id_masuk_}', 'UserController@delete');
});
 Route::get('more', 'ViewMoreController@index')->name('more');
 Route::get('detail/{id}', 'ViewMoreController@detail');
});
// Authentication Route
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');






