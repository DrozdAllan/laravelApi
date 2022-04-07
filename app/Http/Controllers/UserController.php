<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getUser(Request $request) {
        return $request->user();
    }

    public function getToken(Request $request) {
        return $request->user()->tokens;
    }

    public function refreshToken(Request $request) {
        $request->user()
                ->tokens()
                ->delete();

        return $request->user()
                       ->createToken("client_token")->plainTextToken;
    }
}
