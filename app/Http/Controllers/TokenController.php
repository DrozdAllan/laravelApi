<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create(Request $request) {

        $request->user()->tokens()->delete();

        return $request->user()
                       ->createToken("client_token")->plainTextToken;
    }
}
