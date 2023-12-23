<?php

namespace App\Eloquent\User;

use App\Eloquent\Eloquent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserEloquent extends Eloquent
{


    static function register(UserEloquentDto $dto, bool $isCheckEmail = true): User
    {
        if ($isCheckEmail && self::findByEmail($dto->getEmail())) {
            throw ValidationException::withMessages([
                'email' => ['The email address is already in use.'],
            ]);
        }

        $u = new User();
        $u->name = $dto->getName();
        $u->email = $dto->getEmail();
        $u->hashPassword($dto->getPassword());
        $u->save();

        return $u;
    }

    static function createToken(User $user, ?string $deviceName = 'No_name'): string
    {
        return $user->createToken($deviceName)->plainTextToken;
    }

    static function findByEmail(string $email): ?User
    {
        $u = self::searchStart();
        $u = self::searchByEmailLike($u, $email);
        return $u->first();
    }

    public static function updateGoogleUser(User $user, \Laravel\Socialite\Contracts\User $googleUser)
    {
        if ($user->avatar_url !== $googleUser->getAvatar())
            $user->avatar_url = $googleUser->getAvatar();
        if (!$user->email_verified_at)
            $user->email_verified_at = $user->email_verified_at ?? self::checkGoogleEmailVerified($googleUser->user);
        $user->save();

        return $user;
    }

    private static function checkGoogleEmailVerified(array $googleArrayUser): ?Carbon
    {
        $emailVerified = $googleArrayUser['email_verified']
            ?? $googleArrayUser['verified_email']
            ?? null;

        return $emailVerified === true ? now() : null;
    }


    /** *************************** START SEARCH *************************** */

    /**
     * @return User
     */
    public static function searchStart(): Builder
    {
        return User::query();
    }

    /**
     * @param Builder $model
     * @param string|null ...$emails
     * @return Builder|User
     */
    public static function searchByEmailLike(Builder &$model, ?string ...$emails): Builder|User
    {
        return count($emails) > 0
            ? $model->whereIn('email', $emails)
            : $model;
    }


    /** *************************** END SEARCH *************************** */

}
