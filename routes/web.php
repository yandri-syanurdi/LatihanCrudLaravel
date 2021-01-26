<?php

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
//     return view('home');
// });

// Route::get('kirimemail', function(){
//     \Mail::raw('plain text message', function ($message) {
//         $message->from('john@johndoe.com', 'John Doe');
//         $message->sender('john@johndoe.com', 'John Doe');

//         $message->to('john@johndoe.com', 'John Doe');

//         $message->cc('john@johndoe.com', 'John Doe');
//         $message->bcc('john@johndoe.com', 'John Doe');

//         $message->replyTo('john@johndoe.com', 'John Doe');

//         $message->subject('Subject');

//         $message->priority(3);

//         $message->attach('pathToFile');
//     });
// });

// Route::get('kirimemail', function(){
//     \Mail::raw('halo Siswa baru', function ($message) {
//         $message->to('syanurdi.yandri34@gmail.com', 'Yandri Syanurdi');
//         $message->subject('Pendaftaran Siswa');
//     });
// });

Route::get('/test','TestController@test');

Route::get('/','SiteController@home');
Route::get('/register','SiteController@register');
Route::post('/all/register', 'SiswaController@creater');
Route::post('/postregister','SiteController@postregister');




// Route::get('file-upload', 'FileController@fileUpload');
// Route::post('file-upload', 'FileController@fileUploadPost')->name('fileUploadPost');




Route::get('file-upload', 'FileUploadController@index');
Route::post('file-upload/upload', 'FileUploadController@upload')->name('upload');



// Route::get('/{slug}', [
//     'uses' => 'SiteController@singlepost',
//     'as' => 'site.single.post'
// ]);

Route::get('/about','SiteController@about');

// Route::get('/login', 'AuthController@login');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// Route::get('/dashboard', 'DashboardController@index');


// Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
// Route::get('/siswa', 'SiswaController@index')->middleware('auth');
// Route::post('/siswa/create', 'SiswaController@create')->middleware('auth');
// Route::get('/siswa/{id}/edit', 'SiswaController@edit')->middleware('auth');
// Route::post('/siswa/{id}/update', 'SiswaController@update')->middleware('auth');
// Route::get('/siswa/{id}/delete', 'SiswaController@delete')->middleware('auth');


//middleware sebagai filter hak akses
// Route::group(['middleware' => 'auth'],function(){
// Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
Route::group(['middleware' => ['auth','checkRole:admin,guru,siswa']],function(){
    // Route::get('/dashboard', 'DashboardController@index');
    // Route::get('/siswa', 'SiswaController@index');
    Route::get('/all', 'SiswaController@index');
    // Route::get('/siswa', 'SiswaController@index');
    Route::get('/siswa', 'SiswaController@indexku');
    Route::post('/all/create', 'SiswaController@create');
  
    Route::post('/siswa/create', 'SiswaController@createku');
    // Route::get('/siswa/{id}/edit', 'SiswaController@edit');
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
    Route::get('/all/{siswa}/edit', 'SiswaController@myedit');
    // Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::post('/all/{siswa}/update', 'SiswaController@myupdate');
    // Route::get('/siswa/{id}/delete', 'SiswaController@delete');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@delete');
      Route::get('/all/{siswa}/delete', 'SiswaController@deletesaya');

    // Route::get('/siswa/{siswa}/delete', 'SiswaController@deleteku');

    // Route::get('/siswa/{id}/profile', 'SiswaController@profile');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile'); //siswa disini harus sesuai dengan nama model
     Route::get('/all/{siswa}/profile', 'SiswaController@myprofile');
    // Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
    Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    // Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/{siswa}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/exportexcel','SiswaController@exportExcel');
    Route::get('/siswa/exportpdf','SiswaController@exportPdf');
    Route::post('/siswa/import','SiswaController@importexcel')->name('siswa.import');
    Route::get('/guru/{id}/profile', 'GuruController@profile');
    // Route::get('/posts', 'PostController@index');
    Route::get('/posts', 'PostController@index')->name('posts.index');
    // Route::get('post/add', 'PostController@add');
    Route::get('post/add', [
        'uses' => 'PostController@add',
        'as' => 'posts.add',
    ]);
    Route::post('post/create', [
        'uses' => 'PostController@create',
        'as' => 'posts.create',
    ]);

    // Route::post('/siswa/{id}/editnilai','ApiController@editnilai');
    // Route::get('/siswa/{id}/editnilai','ApiController@editnilai');


    //video
    Route::get('/video', 'VideoController@index');

    Route::get('/allvideo', 'VideoController@myindex');

    // Route::post('/video','VideoController@store');
    Route::post('/video/create', 'VideoController@create');
    Route::get('/video/{id}','VideoController@show');
    Route::get('/video/download/{file}','VideoController@download');
    Route::get('/video/{id}/delete', 'VideoController@delete');
    Route::get('/video/{id}/edit', 'VideoController@edit');
    Route::post('/video/{id}/update', 'VideoController@update');



    //Al-Qur'an
    Route::get('/alquran', 'AlquranController@index');
    // Route::post('/alquran','AlquranController@store');
    Route::post('/alquran/create', 'AlquranController@create');
    Route::get('/alquran/{id}','AlquranController@show');
    Route::get('/alquran/download/{file}','AlquranController@download');
    Route::get('/alquran/{id}/delete', 'AlquranController@delete');
    Route::get('/alquran/{id}/edit', 'AlquranController@edit');
    Route::post('/alquran/{id}/update', 'AlquranController@update');

    //image
    Route::get('/image', 'ImageController@index');
    // Route::post('/image','ImageController@store');
    Route::post('/image/create', 'ImageController@create');
    Route::get('/image/{id}','ImageController@show');
    Route::get('/image/download/{file}','ImageController@download');
    Route::get('/image/{id}/delete', 'ImageController@delete');
    Route::get('/image/{id}/edit', 'ImageController@edit');
    Route::post('/image/{id}/update', 'ImageController@update');


    //postingan
    Route::get('/postingan', 'PostingController@index');

    Route::get('/allpostingan', 'PostingController@myindex');


    // Route::post('/postingan','PostingController@store');
    Route::post('/postingan/create', 'PostingController@create');
    Route::get('/postingan/{id}','PostingController@show');
    Route::get('/postingan/download/{file}','PostingController@download');
    Route::get('/postingan/{id}/delete', 'PostingController@delete');
    Route::get('/postingan/{id}/edit', 'PostingController@edit');
    Route::post('/postingan/{id}/update', 'PostingController@update');


    //admin
    Route::get('/myadmin', 'AdminController@index');
    // Route::post('/myadmin','AdminController@store');
    Route::post('/myadmin/create', 'AdminController@create');
    Route::get('/myadmin/{id}','AdminController@show');
    Route::get('/myadmin/download/{file}','AdminController@download');
    Route::get('/myadmin/{id}/delete', 'AdminController@delete');
    Route::get('/myadmin/{id}/edit', 'AdminController@edit');
    Route::post('/myadmin/{id}/update', 'AdminController@update');


    //guru
    Route::get('/guru', 'GuruController@index');
    // Route::post('/guru','GuruController@store');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id}','GuruController@show');
    Route::get('/guru/download/{file}','GuruController@download');
    Route::get('/guru/{id}/delete', 'GuruController@delete');
    Route::get('/guru/{id}/edit', 'GuruController@edit');
    Route::post('/guru/{id}/update', 'GuruController@update');

    //event

    Route::get('/event', 'EventController@index');

    Route::get('/allevent', 'EventController@myindex');


    // Route::post('/event','EventController@store');
    Route::post('/event/create', 'EventController@create');
    Route::get('/event/{id}','EventController@show');
    Route::get('/event/download/{file}','EventController@download');
    Route::get('/event/{id}/delete', 'EventController@delete');
    Route::get('/event/{id}/edit', 'EventController@edit');
    Route::post('/event/{id}/update', 'EventController@update');

    //document
    Route::get('/document', 'DocumentController@index');

     Route::get('/alldocument', 'DocumentController@myindex');


    // Route::post('/document','DocumentController@store');
    Route::post('/document/create', 'DocumentController@create');
    Route::get('/document/{id}','DocumentController@show');
    Route::get('/document/download/{file}','DocumentController@download');
    Route::get('/document/{id}/delete', 'DocumentController@delete');
    Route::get('/document/{id}/edit', 'DocumentController@edit');
    Route::post('/document/{id}/update', 'DocumentController@update');

    //audio
    Route::get('/audio', 'AudioController@index');
    // Route::post('/audio','AudioController@store');
    Route::post('/audio/create', 'AudioController@create');
    Route::get('/audio/{id}','AudioController@show');
    Route::get('/audio/download/{file}','AudioController@download');
    Route::get('/audio/{id}/delete', 'AudioController@delete');
    Route::get('/audio/{id}/edit', 'AudioController@edit');
    Route::post('/audio/{id}/update', 'AudioController@update');

    //artikel
    Route::get('/artikel','ArtikelController@artikel');
    Route::post('/artikel/create','ArtikelController@insert');
    Route::get('/artikel/read/{id}','ArtikelController@read');
    Route::get('/artikel/delete/{id}','ArtikelController@delete');
    Route::get('/artikel/edit/{id}','ArtikelController@edit');
    Route::post('/artikel/update','ArtikelController@update');


    //kamus
    Route::get('/kamus', 'KamusController@index');
    // Route::post('/kamus','KamusController@store');
    Route::post('/kamus/create', 'KamusController@create');
    Route::get('/kamus/{id}','KamusController@show');
    Route::get('/kamus/download/{file}','KamusController@download');
    Route::get('/kamus/{id}/delete', 'KamusController@delete');
    Route::get('/kamus/{id}/edit', 'KamusController@edit');
    Route::post('/kamus/{id}/update', 'KamusController@update');


    //berita
    Route::get('/berita', 'BeritaController@index');
    // Route::post('/berita','BeritaController@store');
    Route::post('/berita/create', 'BeritaController@create');
    Route::get('/berita/{id}','BeritaController@show');
    Route::get('/berita/download/{file}','BeritaController@download');
    Route::get('/berita/{id}/delete', 'BeritaController@delete');
    Route::get('/berita/{id}/edit', 'BeritaController@edit');
    Route::post('/berita/{id}/update', 'BeritaController@update');



   




});


Route::group(['middleware' => ['auth','checkRole:admin,siswa,guru,admin']],function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/forum', 'ForumController@index');
    Route::post('forum/create', 'ForumController@create');
    Route::get('/forum/{forum}/view', 'ForumController@view');

});

Route::group(['middleware' => ['auth','checkRole:siswa,guru,admin']],function(){
    Route::get('profilsaya', 'SiswaController@profilsaya');
    Route::get('profilku', 'SiswaController@profilku');
    // Route::get('/profilsaya/{siswa}/edit', 'SiswaController@edit');
    Route::get('/profilsaya/{siswa}/edit', 'SiswaController@editku');
    Route::post('/profilsaya/{siswa}/update', 'SiswaController@updateku');
});


Route::get('getdatasiswa', [
    'uses' => 'SiswaController@getdatasiswa',
    'as' => 'ajax.get.data.siswa',
]);


Route::get('getdatasiswaku', [
    'uses' => 'SiswaController@getdatasiswaku',
    'as' => 'ajax.get.data.siswaku',
]);

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//harus paling bawah
Route::get('/{slug}', [
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post'
]);