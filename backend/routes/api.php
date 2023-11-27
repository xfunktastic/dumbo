<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\auth\AuthController;

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

//Iniciar Sesión
Route::post('login',[AuthController::class,'login']);

Route::middleware(['jwt'])->group(function() {
    //Visualizar Usuarios
    Route::get('/admin/users',[UserController::class,'index']);
    //Crear Usuario
    Route::post('/admin/users',[UserController::class,'store']);
    //Editar Usuario
    Route::put('/admin/users/{rut}',[UserController::class,'update']);
    //Eliminar Usuario
    Route::delete('/admin/users/{rut}',[UserController::class,'destroy']);
    //Buscar por Usuario Rut
    Route::get('/admin/users/{rut}',[UserController::class,'showRut']);
    //Buscar por Usuario Email
    Route::get('/admin/users/{email}',[AuthController::class,'showEmail']);
    //Cerrar Sesión
    Route::post('/logout',[AuthController::class,'logout']);
});




