<?php

use App\Models\Apps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TPController;
use App\Http\Controllers\LobController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\TestnameController;
use App\Http\Controllers\ReferenceController;

    Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
});

    Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/user/{id}', [UserController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/testplan', [TPController::class, 'index']);
    Route::post('/testplan', [TPController::class, 'store'])->middleware(['ableCreateTP']);
    Route::patch('/testplan/{id}', [TPController::class, 'update'])->middleware(['ableCreateTP']);
    Route::delete('/testplan/{id}', [TPController::class, 'destroy'])->middleware(['ableCreateTP']);

    Route::get('/family', [FamilyController::class, 'index']);
    Route::post('/family', [FamilyController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/family/{id}', [FamilyController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/family/{id}', [FamilyController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/testname', [TestnameController::class, 'index']);
    Route::post('/testname', [TestnameController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/testname/{id}', [TestnameController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/testname/{id}', [TestnameController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/lob', [LobController::class, 'index']);
    Route::post('/lob', [LobController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/lob/{id}', [LobController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/lob/{id}', [LobController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/reference', [ReferenceController::class, 'index']);
    Route::post('/reference', [ReferenceController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/reference/{id}', [ReferenceController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/reference/{id}', [ReferenceController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/apps', [AppsController::class, 'index']);
    Route::post('/apps', [AppsController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/apps/{id}', [AppsController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/apps/{id}', [AppsController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/dept', [DeptController::class, 'index']);
    Route::post('/dept', [DeptController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/dept/{id}', [DeptController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/dept/{id}', [DeptController::class, 'destroy'])->middleware(['ableCreateUser']);

    Route::get('/plant', [PlantController::class, 'index']);
    Route::post('/plant', [PlantController::class, 'store'])->middleware(['ableCreateUser']);
    Route::patch('/plant/{id}', [PlantController::class, 'update'])->middleware(['ableCreateUser']);
    Route::delete('/plant/{id}', [PlantController::class, 'destroy'])->middleware(['ableCreateUser']);
});


