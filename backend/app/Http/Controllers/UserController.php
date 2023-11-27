<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Buscar Usuarios
        $users = User::where('rut','<>','admin')->get();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        //Crear Usuario
        $validator = Validator::make($request->all(), [
            'rut' => 'required|string|regex:/^[0-9]{1,8}-[0-9kK]{1}$/i|unique:users',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'points' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear Usuario
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, string $rut)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $rut,
            'points' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::where('rut', $rut)->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy(string $rut)
    {
        $user = User::where('rut', $rut)->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado exitosamente'], 200);
    }

    public function showRut(string $rut)
    {
        // Buscar Usuario por Rut
        $user = User::where('rut', $rut)->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user);
    }

    public function showEmail(string $email)
    {
        // Buscar Usuario por Email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user);
    }
}
