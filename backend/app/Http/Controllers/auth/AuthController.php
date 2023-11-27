<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\request\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username','password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error'=>'Credenciales inválidas'],400);
            }
        } catch(JWTException $e){
            return response()->json(['error'=>'Token no creado'],500);
        }

    $user = JWTAuth::user();
    if ($user->rut !== 'admin'){
       JWTAuth::invalidate(JWTAuth::getToken()) ;
       return response()->json(['error'=>'No tienes permisos para acceder'],403);
    }

    $rut = $user->rut;
    return response()->json([
        'success'=>'Inicio de sesión exitoso',
        'token'=>$token,
        'rut'=>$rut,
    ],200);
    }

    public function logout(){}
}


