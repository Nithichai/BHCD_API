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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/user-line/new', 'UserLineController@createNewUserLine');
Route::post('/device/new', 'DeviceController@createNewDevice');
Route::post('/device-info/new/only-id', 'DeviceInfoController@createNewDeviceInfoOnlyID');
Route::post('/user-info/check/id', 'UserInfoController@checkUserInfoByID');
Route::post('/user-line/check/esp', 'UserLineController@checkUserLineByESP');
Route::post('/user-line/check/id-esp', 'UserLineController@checkUserLineByIDESP');
Route::post('/device/check/espname', 'DeviceController@checkDeviceByESPName');
Route::post('/device/check/deviceid', 'DeviceController@checkDeviceByDeviceID');
Route::post('/logout', 'UserLineController@deleteUserLineByIDESP');
Route::post('/device/update', 'DeviceController@updateDeviceByESPName');
Route::post('/user-info/new', 'UserInfoController@createNewUserInfo');