<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Resources\User as UserResource;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where(
            [
                ['email','=', $request->email]

            ])->first();

        if( !$user )
        {
            return response()->json(
                [
                    'status'    => 'failed' ,
                    'message'   => 'User Account not found'
                ]);
        }


        if(!Hash::check($request->password,$user->password))
        {
            return response()->json(array(

                'status'    =>  'failed',
                'message'   =>  'Unable to fetch account. Incorrect Login ID or Password Submitted'

                ), 200);
        }

        $token = $user->createToken("ulinc");



        return response()->json(
            [
            'status'    => 'success',
            'message'   => '',
            'user'      => new UserResource($user),
            'token'     => $token->plainTextToken

            ]
        );
    }
}
