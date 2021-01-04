<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function login()
    {
        $credentials = [
            'name'     => request('name'),
            'password' => request('password')
        ];

        if (Auth::attempt($credentials)) {
            $api['token'] = Auth::user()->createToken('MyApp')->accessToken;
            $api['name']  = Auth::user()->name;
            $api['role']  = Auth::user()->role;
            $api['id']    = Auth::user()->id;

            return response()->json($api);
        }

        return response()->json(['error' => 'Unauthorised', $credentials], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'nim'      => 'required',
            'role'     => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name']  = $user->name;

        return response()->json([
            'message'    => 'Sukses',
            'statusCode' => 200
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message'    => 'Successfully logged out',
            'statusCode' => 200
        ], 200);
    }
}
