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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type' );

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user-info/check/id', 'UserInfoController@checkUserInfoByID');
Route::post('/user-info/new', 'UserInfoController@createNewUserInfo');
Route::post('/user-info/update/id', 'UserInfoController@updateUserInfoByID');
Route::post('/user-info/delete/id', 'UserInfoController@deleteUserInfoByID');

Route::post('/user-line/new', 'UserLineController@createNewUserLine');
Route::post('/user-line/check/esp', 'UserLineController@checkUserLineByESP');
Route::post('/user-line/check/id-esp', 'UserLineController@checkUserLineByIDESP');
Route::post('/user-line/delete/id-esp', 'UserLineController@deleteUserLineByIDESP');
Route::post('/user-line/delete/id', 'UserLineController@deleteUserLineByID');

Route::post('/device/new', 'DeviceController@createNewDevice');
Route::post('/device/check/espname', 'DeviceController@checkDeviceByESPName');
Route::post('/device/check/deviceid', 'DeviceController@checkDeviceByDeviceID');
Route::post('/device/update', 'DeviceController@updateDeviceByESPName');

Route::post('/device-info/new/onlyid', 'DeviceInfoController@createNewDeviceInfoOnlyID');
Route::post('/device-info/check/deviceid', 'DeviceInfoController@checkDeviceInfoByDeviceID');
Route::post('/device-info/update/id', 'DeviceInfoController@updateDeviceInfoByDeviceID');
Route::post('/device-info/delete/id', 'DeviceInfoController@deleteDeviceInfoByDeviceID');

Route::post('/health-info/new', 'HealthInfoController@createNewHealthInfo');
Route::post('/health-info/check/esp', 'HealthInfoController@checkHealthInfoByESP');

Route::post('/user-line-device-info/check/esp', 'UserLineAndDeviceInfoController@checkUserLineAndDeviceInfoByESP');
Route::post('/user-line-device-info/list/id', 'UserLineAndDeviceInfoController@listDeviceInfoByID');