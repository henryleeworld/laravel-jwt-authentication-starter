<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Responses\TokenResponse;
use App\Services\Authentication;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Unauthenticated;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

#[Group(
    name: 'Authentication',
    description: 'A collection of Authentication specific endpoints.',
    authenticated: false,
)]
#[Unauthenticated]
final readonly class RegisterController
{
    public function __construct(
        private Authentication $auth,
    ) {}

    /** @throws ValidationException|Throwable */
    public function __invoke(RegistrationRequest $request): Responsable
    {
        $request->ensureIsNotRateLimited();

        $token = $this->auth->register(
            payload: $request->payload(),
        );

        return new TokenResponse(
            token: $token,
            status: Response::HTTP_CREATED,
        );
    }
}
