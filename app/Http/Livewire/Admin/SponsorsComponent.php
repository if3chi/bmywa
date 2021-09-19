<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sponsor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Rules\RequiredIfAdding;
use App\Http\Livewire\Traits\WithUtilities;

class SponsorsComponent extends Component
{
    use WithPagination, WithFileUploads, WithUtilities;

    public $sponsorLogo;
    public $editSponsorLogo;
    public $selectedRecord;
    public Sponsor $editSponsor;
    private $diskName = 'sponsor';

    public function mount()
    {
        $this->selectedRecord = Sponsor::make();
    }

    protected $messages = [
        'editSponsor.name.required' => "Kindly enter a Company's name.",
        'sponsorLogo.required' => 'You need to upload an Image!'
    ];

    protected function rules()
    {
        return [
            'editSponsor.name' => 'required|min:3|max:52',
            'sponsorLogo' => [
                new RequiredIfAdding(str_contains($this->formTitle, 'Add')),
                'max:512',
                'mimes:png,gif,jpeg,jpg'
            ]
        ];
    }

    public function getForm($formType, Sponsor $sponsor)
    {
        $this->resetValidation();
        $this->reset('sponsorLogo');

        if ($formType == 'add') {
            $this->editSponsor = Sponsor::make();
            $this->formTitle = 'Add a Sponsor';
        }

        if ($formType === 'edit') {
            $this->editSponsor = $sponsor;
            $this->editSponsorLogo = $sponsor->logo_url;
            $this->formTitle = 'Edit Sponsor';
        }

        $this->openModal('form');
    }

    public function save()
    {
        $this->validate();

        $imageName = $this->processImage(
            $this->editSponsor->logo,
            $this->sponsorLogo,
            $this->diskName,
            250,
            150
        );

        Sponsor::updateOrCreate(
            ['id' => $this->editSponsor->id],
            [
                'logo' => $imageName,
                'name' => $this->editSponsor->name,
            ]
        );

        $this->notify([
            'title' => str_contains($this->formTitle, 'Edit')
                ? 'Sponsor Updated Successfully'
                : 'Sponsor Added Successfully',
            'body' => $this->editSponsor->name
        ]);

        $this->hideModal('form');
    }

    public function confirmDelete(Sponsor $sponsor)
    {
        $this->getDelModal("Delete Sponsor", $sponsor);
    }

    public function destroy()
    {
        $this->deleteRecord($this->selectedRecord->logo);
    }

    public function updateStatus(Sponsor $sponsor)
    {
        $sponsor->setAttribute('status', !$sponsor->status)->save();
        $action = $sponsor->status ? 'Enabled' : 'Disabled';
        $body = $sponsor->status ? 'now' : 'not';

        $this->flashalert([
            'title' => "$action $sponsor->name",
            'body' => "This Logo will $body be shown on the website."
        ]);
    }

    public function render()
    {
        return view('livewire.admin.sponsors-component',
            ['sponsors' => Sponsor::orderBy('status', 'desc')
                ->latest()
                ->paginate(8)]
        )
            ->layout('layouts.admin');
    }
}