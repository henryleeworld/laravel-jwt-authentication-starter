<?php

namespace App\Http\Payloads\Auth;

final readonly class RegisterPayload
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function make(string $name, string $email, string $password): RegisterPayload
    {
        return new RegisterPayload(
            name: $name,
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
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
