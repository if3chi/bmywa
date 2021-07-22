<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\WithUtilities;
use App\Models\Judge;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Judges extends Component
{

    use WithPagination, WithFileUploads, WithUtilities;

    public $showEditModal = false;
    public $showDelModal = false;
    public Judge $editing;
    public Judge $selectedRecord;
    public $formTitle = '';
    public $judgePhoto;
    public $editJudgePhoto;
    public $perPage = 5;
    private $diskName = 'judge';

    public $rules = [
        'editing.name' => 'required|string',
        'editing.description' => 'required|string|max:140',
        'judgePhoto' => 'required|max:512|mimes:png,jpg,jpeg'
    ];

    public function mount()
    {       
        $this->selectedRecord = Judge::make();
    }

    public function getForm($type, Judge $judge)
    {
        $this->resetValidation();
        if ($type === 'edit') {
            $this->formTitle = 'Edit Judge';
            $this->editing = $judge;
            $this->editJudgePhoto = $judge->avatar_url;
        } else {
            $this->formTitle = 'Add a Judge';
            $this->editing = Judge::make();
            $this->reset('judgePhoto');
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $newImage = null;

        $this->validate();

        if ($this->judgePhoto) {
            $this->delPhoto($this->editing->avatar, $this->diskName);
            $newImage = $this->judgePhoto->store('/', $this->diskName);
        }

        $this->editing->updateOrCreate(
            ['id' => $this->editing->id],
            [
                'name' => ucwords($this->editing->name),
                'avatar' => $newImage,
                'description' => ucwords($this->editing->description)
            ]
        );

        $this->notify([
            'title' => str_contains($this->formTitle, 'Edit')
                ? 'Judge\'s Info Updated Successfully'
                : 'Judge Created Successfully',
            'body' => $this->editing->name
        ]);

        $this->showEditModal = false;
    }

    public function getDelModal(Judge $judge)
    {
        $this->formTitle = "Delete Judge's Data";
        $this->selectedRecord = $judge;
        $this->showDelModal = true;
    }

    public function destroy()
    {
        $this->delPhoto($this->selectedRecord->avatar, $this->diskName);
        $this->selectedRecord->delete();
        $this->notify([
            'title' => 'Deleted Successfully',
            'body' => $this->selectedRecord->name
        ]);
        $this->showDelModal = false;
    }

    public function render()
    {
        return view('livewire.admin.judges', [
            'judges' => Judge::latest()
                ->paginate($this->perPage)
        ])
            ->layout('layouts.admin');
    }
}
