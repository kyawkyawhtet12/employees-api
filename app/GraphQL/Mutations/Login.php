<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\PersonalAccessTokenResult;

final readonly class Login
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::where('email', $args['input']['email'])->first();

        if (!$user || !Hash::check($args['input']['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['These credentials do not match our records.'],
            ]);
        }

        $token = $user->createToken('Personal Access Token')->accessToken;

        return [
            'accessToken' => $token,
            'user' => $user,
        ];
    }
}