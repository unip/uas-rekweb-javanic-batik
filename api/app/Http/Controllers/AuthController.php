<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Expr\BinaryOp\Concat as BinaryOpConcat;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (Hash::check($password, $user->password)) {
            $str = Str::random(40);
            $token = base64_encode($str);
            $bearer = 'bearer ';
            $tokenBearer = $bearer . '' . $token;

            User::where('email', $email)->update([
                'api_token' => $token
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Login Success',
                'data' => [
                    'user' => $user,
                    'api_token' => $token
                ]
            ], 200)->header('Authorization', $tokenBearer);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Faill',
                'data' => [
                    ''
                ]
            ]);
        }
    }

    public function logout(Request $request)
    {

        if ($request->header('Authorization')) {
            $apiToken = explode(' ', $request->header('Authorization'));

            User::where('api_token', $apiToken[1])->update([
                'api_token' => ' '
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Logout Success',
                'data' => ['']
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Logout Faill',
                'data' => [
                    ''
                ]
            ]);
        }
    }
}
