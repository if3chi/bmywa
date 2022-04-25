<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Utilities\Constant;
use Illuminate\Support\Str;
use App\Models\{Role, User};
use App\Mail\EmailContestant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShortListComponent extends Component
{
    use AuthorizesRequests;
    public $activeEntry, $readingView, $filterKey, $country, $contestant = [];

    public function rules()
    {
        return [
            'contestant.firstname' => 'required|max:32|string',
            'contestant.lastname' => 'required|max:32|string',
            'contestant.email' => 'required|email',
            'contestant.fromAddress' => 'required|email',
            'contestant.fromName' => 'required|max:64|string',
            'contestant.subject' => 'required|max:256|string',
            'contestant.message' => ['required', 'string', function ($attribute, $value, $fail) {
                $wordCount = Str::of($value)->wordCount();
                if ($wordCount > 600) {
                    $fail('The message Cannot be more than 600, you have ' . $wordCount);
                }
            },],
        ];
    }

    protected $validationAttributes = [
        'contestant.firstname' => 'First Name',
        'contestant.lastname' => 'Last Name',
        'contestant.email' => 'Email',
        'contestant.fromAddress' => 'From Email',
        'contestant.fromName' => 'From Name',
        'contestant.subject' => 'Subject',
        'contestant.message' => 'Message',
    ];

    public function mount()
    {
        $this->filterKey = auth()->user()->country;
        $this->country = entryCountry()[$this->filterKey];
    }

    public function filterList($key)
    {
        $this->filterKey = $key;
        $this->reset('readingView');
        $this->country = entryCountry()[$this->filterKey];
    }

    public function composeMsg($entry)
    {
        $entry = (object) $entry;

        $this->reset('contestant');
        $this->contestant['firstname'] = trim($entry->firstname);
        $this->contestant['lastname'] = trim($entry->lastname);
        $this->contestant['email'] = $entry->email;
        $this->contestant['fromName'] = 'BMYWA Awards';
        $this->contestant['fromAddress'] = 'no-reply@bmywa.com';
        $this->readingView = collect($entry);
        $this->activeEntry = $entry->id;
    }

    public function sendMsg()
    {
        $this->authorize(Constant::MANAGE_SITE);
        $validData = $this->validate()['contestant'];
        $validData['message'] = textNl2br($validData['message']);

        Mail::to($validData['email'])->queue(new EmailContestant($validData));

        $this->notify(['title' => 'Message queued for sending.']);
        $this->reset('readingView', 'contestant');
    }

    public function render()
    {
        $this->authorize(Constant::MANAGE_SITE);

        return view('livewire.admin.short-list-component', [
            'entries' => $this->entries()
        ])
            ->layout('layouts.admin');
    }

    public function entries()
    {
        $data = User::with('entries')
            ->whereHas('roles', function ($q) {
                $q->where('id', Role::JUDGE);
            })->get()
            ->flatMap(function ($user) {
                return $user->entries;
            })->where('country', $this->filterKey)
            ->sortByDesc('entry_type');

        return $data;
    }
}
