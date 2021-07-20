<?php

namespace App\Http\Livewire\Admin;

use App\Models\Judge;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Judges extends Component
{

    use WithPagination, WithFileUploads;

    public $showEditModal = false;
    public Judge $editing;
    public $formTitle;
    public $judgePhoto;
    public $perPage = 5;

    public $rules = [
        'editing.name' => 'required|string',
        'editing.description' => 'required|string|max:140',
        'judgePhoto' => 'required|max:512|mimes:png,jpg,jpeg'
    ];

    public function getForm()
    {
        $this->formTitle = 'Add a Judge';
        $this->editing = Judge::make();
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->judgePhoto) $newImage = $this->judgePhoto->store('/', 'judge');


            $this->editing->updateOrCreate(
                ['id' => $this->editing->id],
                [
                    'name' => $this->editing->name,
                    'avatar' => $newImage,
                    'description' => $this->editing->description
                ]
            );
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.admin.judges', [
            'judges' => Judge::latest()
                ->paginate(5)
        ])
            ->layout('layouts.admin');
    }
}
