<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Livewire\Component;
use App\Models\TempUser;
use App\Actions\User\OnboardUser;
use App\Http\Livewire\Traits\WithUserValidation;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class CreateUserAccountComponent extends Component
{
    use WithUserValidation;

    public User $editing;
    public array $tempData;

    public function mount(TempUser $tempUser)
    {
        $this->tempData = [
            'id' => $tempUser->id,
            'roles' => $tempUser->role_id,
        ];
        $this->editing = User::make([
            'name' => $tempUser->name,
            'email' => $tempUser->email
        ]);
    }

    public function createUser(OnboardUser $onboardUser)
    {
        $validatedData = $this->validate()['editing'];

        $onboardUser(array_merge(
            $validatedData,
            $this->tempData
        ));

        return redirect(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.front.create-user-account-component')
            ->layout('layouts.guest');
    }
}
