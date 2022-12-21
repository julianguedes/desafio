<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AddressController;


Route::apiResource('users', UserController::class);
Route::get('/users/{user}/infos', [UserController::class, 'showUserInfos']);

Route::apiResource('addresses', AddressController::class);

Route::apiResource('tasks', TaskController::class);
Route::put('/tasks/{task}/task-completed', [TaskController::class, 'taskCompleted']);

