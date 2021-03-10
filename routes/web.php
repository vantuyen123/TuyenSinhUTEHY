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
Route::group(['namespace'=>'FrontEnd'],function (){
    Route::get('/','indexController@index');
    Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function (){
        Route::get('/','indexController@login');
        Route::post('/','indexController@checkLogin');
    });
    Route::group(['prefix'=>'comment'],function (){
       Route::post('/','commentController@addItem');
    });
    Route::group(['prefix'=>'faq'],function (){
       Route::get('/','faqController@listAll');
    });
    Route::get('logout','indexController@logout');
});

Route::group(['namespace'=>'Admin'],function(){
   Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function (){
      Route::get('/','indexController@listAll') ;
      Route::group(['prefix'=>'user'],function (){
          Route::get('/','userController@listAll');
          Route::get('/add','userController@addShow');
          Route::post('/add','userController@addItem');
          Route::get('update/{id}','userController@updateShow');
          Route::post('update/{id}','userController@updateItem');
          Route::get('delete/{id}','userController@deleteItem');
      });
      Route::group(['prefix'=>'student'],function(){
           Route::post('add','studentController@import');
       });
      Route::group(['prefix'=>'post'],function (){
         Route::get('/','postController@listAll');
         Route::get('add','postController@addShow');
         Route::post('add','postController@addItem');
         Route::get('update/{id}','postController@updateShow');
         Route::post('update/{id}','postController@updateItem');
         Route::get('delete/{id}','postController@deleteItem');
      });
      Route::group(['prefix'=>'category'],function (){
         Route::get('/','categoryController@listAll');
         Route::post('/','categoryController@addItem');
         Route::get('update','categoryController@updateItem');
         Route::get('delete/{id}','categoryController@deleteItem');
      });
      Route::group(['prefix'=>'question'],function (){
           Route::get('/','questionController@listAll');
           Route::post('/','questionController@addItem');
           Route::get('update/{id}','questionController@updateItem');
           Route::get('detail/{id}','questionController@detaiItem');
           Route::post('detail/{id}','questionController@addComment');
           Route::get('delete/{id}','questionController@deleteItem');
       });
      Route::group(['prefix'=>'comment'],function (){
         Route::get('delete/{id}','commentController@deleteItem');
      });
   });
});
