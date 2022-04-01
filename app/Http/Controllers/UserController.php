<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    /**
//     * @param Request $request
//     * @return User|\Illuminate\Database\Eloquent\Model
//     */
//    public function register(Request $request)
//    {
//        // You have to send name, email & password
//        return User::create([
//            'name' => $request['name'],
//            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
//        ]);
//    }
}
