<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login','AuthenticationController@login');

Route::middleware(['jwt.auth'])->group(function () {
    Route::post('logout','AuthenticationController@logout');
    //user routes
    Route::get('user/profile/{id}','UserController@getprofile');
    Route::put('user/profile/{id}','UserController@update');
    Route::resource('company', 'CompanyController')->except([
    'edit'
    ]);
    Route::resource('contact', 'ContactController')->except([
    'edit'
    ]);
    Route::resource('event', 'EventController')->except([
    'edit'
    ]);
    Route::resource('lead', 'LeadController')->except([
    'edit'
    ]);
     Route::resource('task', 'TaskController')->except([
    'edit'
    ]);
     Route::resource('ticket', 'TicketController')->except([
    'edit'
    ]);



    //admin routes
    Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>'admin'], function () {
        Route::get('picklists','PicklistController@index');
        Route::get('picklist/{picklist}','PicklistController@content');
        Route::get('picklist/{picklist}/{id}','PicklistController@show');
        Route::post('picklist/{picklist}/add','PicklistController@add');
        Route::patch('picklist/{picklist}/{id}/update','PicklistController@update');
        Route::delete('picklist/{picklist}/{id}/delete','PicklistController@delete');
        Route::resource('users', 'UsersController')->except([
        'edit'
        ]);
    });

});


Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});




