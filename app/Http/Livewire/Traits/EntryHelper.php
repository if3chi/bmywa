<?php

namespace App\Http\Livewire\Traits;

use App\Rules\MaxWords;
use App\Rules\AgeLimits;
use App\Rules\MinWords;
use Illuminate\Validation\Rule;

trait EntryHelper
{

    protected $entryType = ['creative-writing', 'short-story'];

    public function rules()
    {
        return [
            'editing.firstname' => 'required|min:2|max:52|string',
            'editing.lastname' => 'required|min:2|max:52|string',
            'editing.email' => 'required|email',
            'editing.phone' => 'required|phone:AUTO,GH,NG',
            'editing.entry_fee' => 'required|string|min:5',
            'editing.entry_type' => [
                'required',
                Rule::in($this->entryType)
            ],
            'editing.age' => [
                'required',
                new AgeLimits(
                    $this->editing->entry_type === $this->entryType[0]
                        ? [9, 15]
                        : [6, 9],
                    $this->editing->entry_type
                )
            ],
            'editing.award_entry' => [
                'required',
                'string',
                new MinWords(64),
                new MaxWords(
                    $this->editing->entry_type === $this->entryType[0]
                        ? 500
                        : 300
                )
            ]
        ]
            // $messages = [
            //     'email.required' => 'We need to know your email address!',
            // ];
        ;
    }
}
