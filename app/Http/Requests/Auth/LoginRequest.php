<?php

namespace App\Http\Requests\Auth;

use App\Http\Payloads\Auth\LoginPayload;
use App\Http\Requests\Concerns\RateLimited;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    use RateLimited;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function payload(): LoginPayload
    {
        return LoginPayload::make(
            email: $this->string('email')->toString(),
            password: $this->string('password')->toString(),
        );
    }

    /** @return array<string,array<string,string>> */
    public function bodyParameters(): array
    {
        return [
            'email' => [
                'description' => __('The email of the authenticating user.'),
                'example' => 'admin@admin.com',
            ],
            'password' => [
                'description' => __('The password of the authenticating user.'),
                'example' => 'super-secret-password',
            ],
        ];
    }
}
