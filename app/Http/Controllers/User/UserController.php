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
            'nim'     => request('nim'),
            'password' => request('password')
        ];

        if (Auth::attempt($credentials)) {
            $api['token'] = Auth::user()->createToken('MyApp')->accessToken;
            $api['name']  = Auth::user()->name;
            $api['nim']  = Auth::user()->nim;
            $api['role']  = Auth::user()->role;
            $api['id']    = Auth::user()->id;

            return response()->json($api);
        }

        return response()->json(['error' => 'Unauthorised', $credentials], 401);
    }

    public function register(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name'     => 'required',
            'nim'      => 'required',
            'role'     => 'required',
            'password' => 'required',
            'notification_token',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);

        $cekUser = User::where('nim', $input['nim'])->first();

        if (empty($cekUser)) {
            $user = User::create($input);
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name']  = $user->name;

            return response()->json([
                'message'    => 'Sukses',
                'statusCode' => 200
            ], 200);
        }

        return response()->json([
            'message'    => 'Your input value has been registered',
            'statusCode' => 401
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message'    => 'Successfully logged out',
            'statusCode' => 200
        ], 200);
    }

    public function notifTest()
    {
        $channelName = 'notification';
        $recipient = 'ExponentPushToken[ME-YIoEJRiwlmakjHtFMwH]';

        // You can quickly bootup an expo instance
        $expo = \ExponentPhpSDK\Expo::normalSetup();

        // Subscribe the recipient to the server
        $expo->subscribe($channelName, $recipient);

        // Build the notification data
        $notification = ['body' => 'Selamat Kamu Wisuda'];

        // Notify an interest with a notification
        $expo->notify([$channelName], $notification);

        return response()->json($expo);
    }
}
