<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Registrar novo usuário
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $usuario = Usuario::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'Usuário registrado com sucesso', 'user' => $usuario], 201);
    }

    // Login de usuário
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Credenciais inválidas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Erro ao gerar token'], 500);
        }

        return response()->json(['token' => $token, 'user' => auth()->user()], 200);
    }

    // Logout do usuário
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Logout realizado com sucesso'], 200);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Erro ao realizar logout'], 500);
        }
    }

    // Obter usuário autenticado
    public function me()
    {
        return response()->json(auth()->user());
    }
}
