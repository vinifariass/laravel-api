<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponses;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginUserRequest $request)
    {
        $request->validate($request->all());

        if(!Auth::atempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email',$request->email);

        return $this->ok(
            'Authenticated',
            [
                'user' => $user,
                'token' => $user->createToken(
                    'API Token for ' . $user->email,
                    ['*'],
                    now()->addMonth())->plainTextToken,
                    // expires in 1 month
            ]
            );
    }

    public function logout(Request $request)
    {
        //Revoke all tokens for the authenticated user
        $request->user()->currentAccessToken()->delete();
        return $this->ok('');
    }
}
