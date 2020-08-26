<?php

use App\Model\News;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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

    Route::get('admin/login', 'Admin\UserController@loginAdmin')->name('admin.login');
    Route::post('admin/handle-login','Admin\UserController@handleLogin')->name('admin.handleLogin');
    Route::get('admin/logout', 'Admin\UserController@logout')->name('admin.logout');

/*---------Index Dashboard-----------*/
Route::group([
    'prefix' => 'admin',
    'middleware' => 'check.admin.login',
    'as' => 'admin.',
    //duoc chi dinh mot nhom controller admin
    'namespace'=>'Admin',
],function (){
    /*===========DASHBOARD============*/
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    /*===========CATEGORY============*/
    Route::group([
        'prefix' => 'category'
    ],function (){
//        get de ta goi form sua ra va post giup ta them gui data len
        Route::get('list','CategoryController@getList')->name('category.list');

        Route::get('edit/{id}','CategoryController@getEdit')->name('category.edit');
        Route::post('edit/{id}','CategoryController@postEdit')->name('category.handle.edit');

        Route::get('add','CategoryController@getAdd')->name('category.add');
        Route::post('handle-add','CategoryController@postAdd')->name('category.handle.add');

        Route::get('delete/{id}','CategoryController@getDelete')->name('category.delete');
    });
    /*===========TYPE============*/
    Route::group([
        'prefix' => 'type'
    ],function (){

        Route::get('list','TypeController@getList')->name('type.list');

        Route::get('edit/{id}','TypeController@getEdit')->name('type.edit');
        Route::post('edit/{id}','TypeController@postEdit')->name('type.handle.edit');

        Route::get('add','TypeController@getAdd')->name('type.add');
        Route::post('handle-add','TypeController@postAdd')->name('type.handle.add');

        Route::get('delete/{id}','TypeController@getDelete')->name('type.delete');
    });
    /*===========NEWS============*/
    Route::group([
        'prefix' => 'news'
    ],function (){

        Route::get('list','NewsController@getList')->name('news.list');

        Route::get('edit/{id}','NewsController@getEdit')->name('news.edit');
        Route::post('edit/{id}','NewsController@postEdit')->name('news.handle.edit');

        Route::get('add','NewsController@getAdd')->name('news.add');
        Route::post('handle-add','NewsController@postAdd')->name('news.handle.add');

        Route::get('delete/{id}','NewsController@getDelete')->name('news.delete');
    });
    /*===========COMMENT============*/
    Route::group([
        'prefix' => 'comment',
    ],function (){
        Route::get('delete/{idc}~{idNews}','CommentController@getDelete')->name('comment.delete');
    });
    /*===========SLIDER============*/
    Route::group([
        'prefix' => 'slide'
    ],function (){

        Route::get('list','SlideController@getList')->name('slide.list');

        Route::get('edit/{id}','SlideController@getEdit')->name('slide.edit');
        Route::post('edit/{id}','SlideController@postEdit')->name('slide.handle.edit');

        Route::get('add','SlideController@getAdd')->name('slide.add');
        Route::post('handle-add','SlideController@postAdd')->name('slide.handle.add');

        Route::get('delete/{id}','SlideController@getDelete')->name('slide.delete');
    });
    /*===========USER============*/
    Route::group([
        'prefix' => 'user'
    ], function (){

        Route::get('list','UserController@getList')->name('user.list');

        Route::get('edit/{id}','UserController@getEdit')->name('user.edit');
        Route::post('edit/{id}','UserController@postEdit')->name('user.handle.edit');

        Route::get('add','UserController@getAdd')->name('user.add');
        Route::post('handle-add','UserController@postAdd')->name('user.handle.add');

        Route::get('delete/{id}','UserController@getDelete')->name('user.delete');


        Route::get('profile', 'UserController@profileAdmin')->name('profile');
    });
    /*===========SEARCH============*/
    Route::group([
        'prefix' => 'search'
        ], function (){
             Route::get('tim-kiem','SearchController@search')->name('handle-search');
        }
    );

    /*===========AJAX============*/
    Route::group([
        'prefix' => 'ajax'
        ], function (){

            Route::get('type/{idCate}','AjaxController@getType')->name('ajax.type');

        }
    );
});

/*===========PAGES============*/
Route::get('trang-chu', 'PagesController@home')->name('home');
Route::get('blog', 'PagesController@blog')->name('blog');
Route::get('lien-he', 'PagesController@contact')->name('contact');
Route::get('loai-tin/{id}/{TenKhongDau}.html', 'PagesController@typeNews')->name('typeNews');
Route::get('the-loai/{id}/{TenKhongDau}.html', 'PagesController@category')->name('category');
Route::get('tin-tuc/{id}/{TenKhongDau}.html', 'PagesController@new')->name('new');
Route::get('about', 'PagesController@about')->name('about');
route::get('tin-moi', 'PagesController@newFeed')->name('new-feed');

/*===========USERS============*/
Route::get('dang-ki', 'PagesController@getSignUp')->name('user-sign-up');
Route::post('dang-ki', 'PagesController@postSignUp')->name('handle-user-sign-up');
Route::get('dang-nhap', 'PagesController@getLogin')->name('user-login');
Route::post('dang-nhap', 'PagesController@postLogin')->name('handle-user-login');
Route::get('dang-xuat', 'PagesController@getLogout')->name('user-logout');
Route::get('nguoi-dung', 'PagesController@getUser')->name('user-info');
Route::post('nguoi-dung', 'PagesController@postUser')->name('handle-user-info');

Route::post('comment/{id}', 'Admin\CommentController@postController');

Route::get('tim-kiem', 'PagesController@getSearch')->name('search');
