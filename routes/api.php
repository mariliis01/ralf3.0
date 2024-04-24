<?php

use App\Http\Controllers\Api\MakeUpController;
use App\Models\MakeUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
});*/


Route::get('/makeup', [MakeUpController::class, 'index']);

Route::get('/makeup', function (Request $request) {

        if ($limit = request('limit')) {
                return Cache::remember('my-request' . $limit, now()->addHour(), fn () => MakeUp::paginate($limit));
        }
        return MakeUp::all();
});
