<?php

namespace App\Http\Payloads\Auth;

final readonly class LoginPayload
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}

    public static function make(string $email, string $password): LoginPayload
    {
        return new LoginPayload(
            email: $email,
            password: $password,
        );
    }

    /**
     * Get all of the input and files for the request.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
