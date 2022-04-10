<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMail(Request $request) {
        // receive user 'mail' and 'message' in the request
        Mail::to($request->mail)
            ->send(new ContactMail($request->mail, $request->message));
    }
    // TODO: créer un compte AWS
}
