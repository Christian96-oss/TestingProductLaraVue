<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'user_id' => 'required|string',
            'password' => 'required',
        ]);
        $user = User::where('user_id', $request->user_id)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'user_id' => ['The provided credentials are incorrect.'],
            ]);
        }
        unset($user->email_verified_at);
        unset($user->created_at);
        unset($user->updated_at);
        unset($user->deleted_at);

        $user->tokens()->delete();
        $token = $user->createToken('santum')->plainTextToken;
        $user->token = $token;
        return response(['data' => $user]);
    }

    function logout()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return response(['message' => 'logout success']);
    }


    public function me()
{
    return response(['data' => Auth::guard('sanctum')->user()]);
}
}
