<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubtarefaController;
use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.auth']], function () {
    // Me -->
    Route::get('me', [AuthController::class, 'me']);
    // Teste -->
    Route::post('teste', [AuthController::class, 'teste']);
    // Tarefas -->
    Route::post('tarefa', [TarefaController::class, 'create']);
    Route::post('tarefa/{id}', [TarefaController::class, 'update']);
    Route::post('tarefa/{id}', [TarefaController::class, 'destroy']);
    // Subtarefas -->
    Route::post('subtarefa', [SubtarefaController::class, 'create']);
    Route::post('subtarefa/{id}', [SubtarefaController::class, 'update']);
    Route::post('subtarefa/{id}', [SubtarefaController::class, 'destroy']);
});
