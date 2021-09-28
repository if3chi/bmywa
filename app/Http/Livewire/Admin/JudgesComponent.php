<?php

namespace App\Http\Livewire\Admin;

use App\Models\Judge;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Rules\RequiredIfAdding;
use App\Http\Livewire\Traits\WithUtilities;

class JudgesComponent extends Component
{

    use WithPagination, WithFileUploads, WithUtilities;

    public Judge $editing;
    public Judge $selectedRecord;
    public $judgePhoto;
    public $editJudgePhoto;
    public $perPage = 5;
    private String $diskName = 'judge';

    protected $messages = [
        'editing.name.required' => 'Kindly enter the Judges names.',
        'judgePhoto.required' => 'You need to upload an Image!'
    ];

    protected function rules()
    {
        return [
            'editing.name' => 'required|string',
            'editing.profession' => 'nullable|string|max:140',
            'editing.description' => 'nullable|string|max:240',
            'judgePhoto' => [
                new RequiredIfAdding(str_contains($this->formTitle, 'Add')),
                'max:512',
                'mimes:png,jpg,jpeg',
            ]
        ];
    }

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

        $imageName = $this->processImage(
            $this->editing->avatar, 
            $this->judgePhoto, 
            $this->diskName, 
            512, 512);

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
        return view('livewire.admin.judges-component', [
            'judges' => Judge::latest()
                ->paginate($this->perPage)
        ])
            ->layout('layouts.admin');
    }
}
