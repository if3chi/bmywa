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

    protected $validationAttributes = [
        'editing.socials.twitter' => 'Twitter Username',
        'editing.socials.linkedin' => 'Linkedin Username',
        'editing.socials.facebook' => 'Facebook Username',
        'editing.socials.instagram' => 'Instagram Username',
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
            ],
            'editing.socials.twitter' => 'nullable|string|min:3|max:15|regex:/(^([a-zA-Z0-9_-]+)(\d+)?$)/u',
            'editing.socials.linkedin' => 'nullable|string|min:3|max:30|regex:/(^([a-zA-Z0-9_-]+)(\d+)?$)/u',
            'editing.socials.facebook' => 'nullable|string|min:3|max:30|regex:/(^([a-zA-Z0-9_-]+)(\d+)?$)/u',
            'editing.socials.instagram' => 'nullable|string|min:3|max:30|regex:/(^([a-zA-Z0-9_-]+)(\d+)?$)/u',
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
            $this->editing->socials = json_decode($judge->socials);
            $this->editJudgePhoto = $judge->avatar_url;
        } else {
            $this->formTitle = 'Add a Judge';
            $this->editing = Judge::make();
        }

        $this->openModal('form');
    }

    public function save()
    {
        $validatedData = $this->validate()['editing'];

        $imageName = $this->processImage(
            $this->editing->avatar,
            $this->judgePhoto,
            $this->diskName,
            512,
            512
        );


        $this->editing->updateOrCreate(
            ['id' => $this->editing->id],
            [
                'name' => ucwords($validatedData['name']),
                'avatar' => $imageName,
                'profession' => ucwords($validatedData['profession']),
                'description' => ucwords($validatedData['description']),
                'socials' => json_encode($validatedData['socials']),
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
