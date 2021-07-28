<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\WithUtilities;
use App\Models\Judge;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class JudgeComponent extends Component
{

    use WithPagination, WithFileUploads, WithUtilities;

    public Judge $editing;
    public Judge $selectedRecord;
    public $judgePhoto;
    public $editJudgePhoto;
    public $perPage = 5;
    private String $diskName = 'judge';

    public $rules = [
        'editing.name' => 'required|string',
        'editing.profession' => 'string|max:140',
        'editing.description' => 'string|max:240',
        'judgePhoto' => 'required|max:512|mimes:png,jpg,jpeg'
    ];

    public function mount()
    {
        $this->selectedRecord = Judge::make();
    }

    public function getForm($type, Judge $judge)
    {
        $this->resetValidation();
        $this->reset('judgePhoto');

        if ($type === 'edit') {
            $this->formTitle = 'Edit Judge';
            $this->editing = $judge;
            $this->editJudgePhoto = $judge->avatar_url;
        } else {
            $this->formTitle = 'Add a Judge';
            $this->editing = Judge::make();
        }

        $this->openModal('form');
    }

    public function save()
    {
        $this->validate();

        $imageName = $this->processImage($this->editing->avatar, $this->judgePhoto, $this->diskName);

        $this->editing->updateOrCreate(
            ['id' => $this->editing->id],
            [
                'name' => ucwords($this->editing->name),
                'avatar' => $imageName,
                'profession' => ucwords($this->editing->profession),
                'description' => ucwords($this->editing->description)
            ]
        );

        if (str_contains($this->formTitle, 'Add')) $this->resetPage();

        $this->notify([
            'title' => str_contains($this->formTitle, 'Edit')
                ? 'Judge\'s Info Updated Successfully'
                : 'Judge Created Successfully',
            'body' => $this->editing->name
        ]);

        $this->hideModal('form');
    }

    public function confirmDelete(Judge $judge)
    {
        $this->getDelModal("Delete Judge's Data", $judge);
    }

    public function destroy()
    {
        $this->deleteRecord($this->selectedRecord->avatar);
    }

    public function render()
    {
        return view('livewire.admin.judge-component', [
            'judges' => Judge::latest()
                ->paginate($this->perPage)
        ])
            ->layout('layouts.admin');
    }
}
