<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if (auth('web')->attempt($data, true)) {
            $user = auth('web')->user();

            return redirect()->route('dashboard')->with([
                'message' => 'Welcome, ' . $user->name,
                'code' => HttpStatus::OK
            ]);
        }

        return redirect()->back()->with('error', 'Incorrect username or password. Please verify your credentials.');
    }
}
