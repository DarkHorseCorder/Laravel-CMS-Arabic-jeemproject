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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'],  function () {

    

    // Route::get('invoices', 'InvoiceApiController@index');
    // Route::put('invoices/{invoice}', 'InvoiceApiController@update');
    // Route::get('invoice',  'InvoiceApiController@show');


});
