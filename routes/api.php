<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\StudyController;
use \App\Http\Controllers\Api\GroupController;
use \App\Http\Controllers\Api\StudyPlanController;
use \App\Http\Controllers\Api\LectureController;

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

// students
Route::apiResources([
    'study' => StudyController::class,
]);
Route::get('/study-list', [StudyController::class, 'studyList']);

//group
Route::apiResources([
    'group' => GroupController::class,
]);
Route::get('/group-list', [GroupController::class, 'groupList']);
Route::get('/group-plan', [GroupController::class, 'groupPlan']);

//study_plan
Route::apiResources([
    'plan' => StudyPlanController::class,
]);

//lectures
Route::apiResources([
    'lecture' => LectureController::class,
]);


