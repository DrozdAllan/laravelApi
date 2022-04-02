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
    public function getUser(Request $request)
    {
        return new JsonResponse(['user' => $request->user(), 'userTokens' => $request->user()->tokens]);
    }
}
