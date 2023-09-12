<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Valide os dados de entrada acessando LoginRequest
        $input = $request->validated();

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password']
        ];

        // Valide se exsite o usuario para retornar o token ou não
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer',
            // 'expires_in' => auth()->factory()->getTTL()
        ]);
    }

    public function register(RegisterRequest $request)
    {
        // Valide os dados de entrada conforme necessário
        $input = $request->validated();

        // Crie o usuário com criptografia na senha
        $user = new User([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->save();

        // Redirecione ou retorne uma resposta de sucesso
        return response()->json(['message' => 'Usuário criado com sucesso'], 201);
    }

    public function teste(Request $request)
    {
        return response()->json(['message' => $request], 201);
    }
}
