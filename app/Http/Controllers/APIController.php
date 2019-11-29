<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Medicamento;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class APIController extends Controller
{
    public function apiLogin (Request $request) {
        if(isset($request) and !empty($request)) {
            $username = $request->input('email');
            $password = $request->input('password');

            Log::info($username . ' ' .  $password);

            if($username == "usuario@gmail.com" and $password == "MTIzNDU2Nzg=") {
                $response = array(
                    'sucesso' => true,
                    'user_id' => 1,
                    'token' => Str::random(16)
                );
                return json_encode($response);
            }
            if($username == "entregador@gmail.com" and $password = "MTIzNDU2Nzg=") {
                $response = array(
                    'sucesso' => true,
                    'user_id' => 2,
                    'perfil_id' => 2,
                    'token' => Str::random(16)
                );
                return json_encode($response);
            }
        }
        $response = array(
            'sucesso' => false
        );
        return json_encode($response);
    }

    public function apiSearch(Request $request) {
        return Medicamento::all();
    }
}
