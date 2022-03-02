<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Validation\Rules\Password;

trait WithUserValidation
{

    protected $validationAttributes = [
        'editing.passwd' => 'password',
        'editing.passwd_confirmation' => 'password confirmation'
    ];

    public function rules()
    {
        return [
            'editing.name' => 'required|string|max:255',
            'editing.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'editing.passwd' => ['required', 'confirmed', Password::defaults()],
            'editing.passwd_confirmation' => ['same:editing.passwd']
        ];
    }
}
