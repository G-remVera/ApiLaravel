<?php

use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware'=>['auth:api']], function (){

});
Route::resource('articles', 'ArticleController');
Route::delete('/articles/{id}','ArticleController@destroy');
Route::get('/articles/{id}','ArticleController@show');
//Route::resource('articles','ArticleController');
Route::resource('tags','TagController');
Route::resource('categories','CategoryController');
Route::get('/articles/categories/{id}','ArticleController@indexByCat');
Route::get('/user','UserController@index');
Route::get('/articles','ArticleController@index')->middleware('cors');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/articles/tags/{id}','ArticleController@indexByTag');
