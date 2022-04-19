<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sponsor;
use App\Utilities\Constant;
use App\Rules\RequiredIfAdding;
use App\Http\Livewire\Traits\WithUtilities;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\{Component, WithFileUploads, WithPagination};

class SponsorsComponent extends Component
{
    use AuthorizesRequests, WithPagination, WithFileUploads, WithUtilities;

    public Sponsor $editSponsor;
    private $diskName = 'sponsor';
    public $sponsorLogo, $editSponsorLogo, $selectedRecord;

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
            'editSponsor.web_address' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|max:100',
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
        $validatedData = $this->validate()['editSponsor'];

        $imageName = $this->processImage(
            $this->editSponsor->logo,
            $this->sponsorLogo,
            512,
            512,
            $this->diskName
        );

        Sponsor::updateOrCreate(
            ['id' => $this->editSponsor->id],
            [
                'logo' => $imageName,
                'name' => $validatedData['name'],
                'web_address' => $validatedData['web_address'],
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
        $this->authorize(Constant::MANAGE_SITE);

        return view('livewire.admin.sponsors-component',
            ['sponsors' => Sponsor::orderBy('status', 'desc')
                ->latest()
                ->paginate(8)]
        )
            ->layout('layouts.admin');
    }
}
