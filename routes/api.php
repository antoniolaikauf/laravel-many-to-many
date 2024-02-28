<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// rotta per vedere il json sul tuo backend
// accanto a v1 ci sarà api ma non si mette perche laravel lo mette gia di defaul quindi per voler vedere le tue pagine nel browser 
// si scrive api\v\Technologies technologies lo puoi chiamare come vuoi dandogli un nome sensato 
// dopo bisogna importare il controller e il metodo che si usa 
Route::group(['prefix' => '/v1'], function () {

    Route::get('Technologies', [ApiController::class, 'getTechnologies']);
    Route::post('Technologies', [ApiController::class, 'createNewTechnology']);
});
