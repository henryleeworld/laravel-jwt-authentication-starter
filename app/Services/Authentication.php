<?php

namespace App\Services;

use App\Http\Payloads\Auth\LoginPayload;
use App\Http\Payloads\Auth\RegisterPayload;
use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Validation\ValidationException;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use Throwable;

final readonly class Authentication
{
    public function __construct(
        private JWTAuth $guard,
        private DatabaseManager $database,
    ) {}

    public function login(LoginPayload $payload): string
    {
        return $this->guard->attempt(
            credentials: $payload->toArray(),
        );
    }

    /** @throws ValidationException|Throwable */
    public function register(RegisterPayload $payload): string
    {
        $user = $this->database->transaction(
            callback: fn() => User::query()->create(
                attributes: array_merge(
                    $payload->toArray(),
                    ['password' => $payload->password],
                ),
            ),
            attempts: 3,
        );

        return $this->guard->attempt(
            credentials: [
                'email' => $payload->email,
                'password' => $payload->password,
            ],
        );
    }
}
