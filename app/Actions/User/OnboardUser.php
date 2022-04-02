<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\TempUser;
use App\Mail\NewUserOnboarded;
use Illuminate\Support\Facades\DB;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class OnboardUser
{
    public function __invoke(array $data): Void
    {

        DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'country' => $data['country'],
                'password' => Hash::make($data['passwd']),
            ]);

            $user->roles()->sync($data['roles']);

            TempUser::find($data['id'])->delete();

            event(new Registered($user));

            // TODO: Use Notifications and events
            Mail::to($user->email)->queue(new RegistrationSuccessful($user->name));
            foreach (getAdminEmails() as $email) {
                Mail::to($email)->queue(new NewUserOnboarded($user));
            }
        });
    }
}
