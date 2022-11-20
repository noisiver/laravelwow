<?php

namespace App\Providers;

use App\Services\SRP6Service;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class EloquentSRP6UserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        /** @var SRP6Service $SRP6Service */
        $SRP6Service = app(SRP6Service::class);

        $username = $credentials['username'];
        $password = $credentials['password'];

        return $SRP6Service->verifyLogin(
            $username,
            $password,
            $user->salt,
            $user->verifier,
        );
    }
}
