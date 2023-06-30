<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credencias = $request->all(['email', 'password']);
        //autenticação(email e senha)
        $token = auth('api')->attempt($credencias);

        if($token) { //usuario autenticado com sucesso
            return response()->json(['token' => $token], 200);

        } else { //erro de usuário ou senha
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);

            //401 = Unauthorized -> não autorizado
            //403 = forbidden -> proibido (login inválido)
        }

        //retornar um Json Web Token
    }

    public function logout() {

    }

    public function refresh() {

    }

    public function me() {
        
    }
}
