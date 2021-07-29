<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sponsor;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\WithUtilities;

class SponsorComponent extends Component
{
    use WithPagination, WithFileUploads, WithUtilities;

    public $sponsorLogo;
    public $editSponsorLogo;
    public $selectedRecord;
    public Sponsor $editSponsor;
    private $diskName = 'sponsor';

    public function mount()
    {
        $this->editSponsor = Sponsor::make();
        $this->selectedRecord = Sponsor::make();
    }

    public $rules = [
        'editSponsor.name' => 'required',
        'sponsorLogo' => 'required|mimes:png,gif,jpg,jpeg|max:512'
    ];

    public function getForm($formType, Sponsor $sponsor)
    {
        if ($formType == 'Add') {
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
            $this->diskName
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

    public function render()
    {
        return view(
            'livewire.admin.sponsor-component',
            ['sponsors' => Sponsor::latest()->paginate(8)]
        )
            ->layout('layouts.admin');
    }
}
