<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\TokenResponse;
use App\Services\Authentication;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Unauthenticated;

#[Group(
    name: 'Authentication',
    description: 'A collection of Authentication specific endpoints.',
    authenticated: false,
)]
#[Unauthenticated]
final readonly class LoginController
{
    public function __construct(
        private Authentication $auth,
    ) {}

    /** @throws ValidationException */
    public function __invoke(LoginRequest $request): Responsable
    {
        $request->ensureIsNotRateLimited();

        $token = $this->auth->login(
            payload: $request->payload(),
        );

        return new TokenResponse(
            token: $token,
        );
    }
}
