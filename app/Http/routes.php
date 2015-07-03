<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
/**
 * Client controller route protected by auth middleware
 * for user protections only .
 * the client controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('client'                 , 'ClientController@index');
    Route::get('client/create'          , 'ClientController@create');
    Route::post('client/store'          , 'ClientController@store');
    Route::get('client/edit/{id}'       , 'ClientController@edit');
    Route::post('client/update/{id}'    , 'ClientController@update');
    Route::get('client/delete/{id}'     , 'ClientController@destroy');
    Route::get('client/{id}'            , 'ClientController@show');

});

/**
 * Bank Detail controller route protected by auth middleware
 * for user protections only .
 * the client controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('bankDetail'                 , 'BankDetailController@index');
    Route::get('bankDetail/create'          , 'BankDetailController@create');
    Route::post('bankDetail/store'          , 'BankDetailController@store');
    Route::get('bankDetail/edit/{id}'       , 'BankDetailController@edit');
    Route::post('bankDetail/update/{id}'    , 'BankDetailController@update');
    Route::get('bankDetail/delete/{id}'     , 'BankDetailController@destroy');
    Route::get('bankDetail/{id}'            , 'BankDetailController@show');

});
/**
 * Owner controller route protected by auth middleware
 * for user protections only .
 * the Owner controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {

    Route::get('owner'              , 'OwnerController@index');
    Route::get('owner/create'       , 'OwnerController@create');
    Route::post('owner/store'   , 'OwnerController@store');
    Route::get('owner/edit/{id}'     , 'OwnerController@edit');
    Route::post('owner/update/{id}'  , 'OwnerController@update');
    Route::get('owner/delete/{id}', 'OwnerController@destroy');
    Route::get('owner/getbank/{id}','RentalAgreementController@OwnerBank');
    Route::get('owner/{id}'     , 'OwnerController@show');

});


/**
 * Property controller route protected by auth middleware
 * for user protections only .
 * the Property controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('property'           , 'PropertyController@index');
    Route::get('property/create'    , 'PropertyController@create');
    Route::get('property/store/{id}', 'PropertyController@store');
    Route::get('property/edit/{id}' , 'PropertyController@edit');
    Route::post('property/update/{id}'   , 'PropertyController@update');
    Route::get('property/destroy/{id}'   , 'PropertyController@destroy');
    Route::get('property/{id}'      , 'PropertyController@show');

});

/**
 * Property controller route protected by auth middleware
 * for user protections only .
 * the Property controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('address'                , 'AddressController@index');
    Route::get('address/create'         , 'AddressController@create');
    Route::post('address/store'         , 'AddressController@store');
    Route::get('address/edit/{id}'      , 'AddressController@edit');
    Route::post('address/update/{id}'   , 'AddressController@update');
    Route::get('address/destroy/{id}'   , 'AddressController@destroy');
    Route::get('address/{id}'           , 'AddressController@show');

});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
