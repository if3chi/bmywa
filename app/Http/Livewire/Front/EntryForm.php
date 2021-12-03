<?php

namespace App\Http\Livewire\Front;

use App\Models\Entry;
use Livewire\Component;
use App\Mail\NewEntrySubmitted;
use App\Mail\SubmissionRecieved;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\Traits\EntryHelper;

class EntryForm extends Component
{
    use EntryHelper;

    public $country;
    public Entry $editing;

    protected $listeners  = ['resetForm'];

    public function mount()
    {
        $this->editing = $this->makeBlank();
    }

    public function resetForm()
    {
        $this->editing = $this->makeBlank();
    }

    public function submitEntry()
    {
        if (entryIsActive()) {
            $validatedData = $this->validate()['editing'];

            $validatedData['award_entry'] = textNl2br($validatedData['award_entry']);

            $entryData = Entry::create($validatedData);

            Mail::to($entryData->email)
                ->queue(new SubmissionRecieved($entryData));

            $this->flashalert([
                'title' => 'Entry Submitted',
                'body' => 'Kindly Check the email you provided for more details.'
            ]);

            // TODO: Use Notifications 
            foreach (getAdminEmails() as $email) {
                Mail::to($email)->queue(new NewEntrySubmitted($entryData));
            }
        } else {
            $this->flashalert([
                'title' => 'Submission Invalid',
                'body' => 'We\'re currently not accepting submissions at the moment.
                Kindly check the dates.',
                'type' => 'danger'
            ]);
        }

        $this->emitSelf('resetForm');
    }

    public function render()
    {
        return view('livewire.front.entry-form');
    }

    public function makeBlank()
    {
        return Entry::make(['age' => '', 'entry_type' => '', 'country' => '']);
    }
}
