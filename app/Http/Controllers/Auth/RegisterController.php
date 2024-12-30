<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\SendVerifyJob;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->create($data);

        SendVerifyJob::dispatch($user);

        return response([
            'message' => 'Register successfully, Please check your email to activate your account.',
            'code' => HttpStatus::OK,
        ], HttpStatus::OK);
    }
}
