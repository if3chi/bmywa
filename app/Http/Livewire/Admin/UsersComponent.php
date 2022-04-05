<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\TempUser;
use App\Utilities\Constant;
use Livewire\WithPagination;
use App\Mail\SendTempUserEmail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Actions\User\CreateTempUser;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\Traits\WithUtilities;

class UsersComponent extends Component
{
    use WithPagination, WithUtilities;

    public $selectedRecord;
    public $editing;
    public $userRole = '';

    protected function rules()
    {
        return [
            'editing.name' => 'nullable|string',
            'editing.email' => 'required|email',
            'userRole' => 'required|exists:roles,id',
            'editing.country' => ['required', Rule::in(array_keys(entryCountry()))]
        ];
    }

    public function mount()
    {
        $this->selectedRecord = User::make();
    }

    public function getForm($type, User $user)
    {
        $this->resetValidation();
        $this->reset('userRole');

        if ($type === Constant::EDIT) {
            $this->formTitle = 'Edit User';
            $this->editing = $user;
            $this->userRole = $user->abilities ? $user->abilities : '';
        } else {
            $this->formTitle = 'Add a User';
            $this->editing = TempUser::make(['country' => '']);
        }

        $this->openModal('form');
    }

    public function save()
    {
        $data = $this->validate();

        $validatedData = array_merge(
            $data['editing'],
            ['role' => $data['userRole']]
        );

        if (str_contains($this->formTitle, Constant::ADD)) {
            $tempUserEmail = (new CreateTempUser)($validatedData);
            Mail::to($tempUserEmail->email)
                ->queue(new SendTempUserEmail($tempUserEmail));
        } else {
            $user = $this->editing;
            $user->update(
                [
                    'name' => ucwords($validatedData['name']),
                    'email' => $validatedData['email'],
                ]
            );

            $user->roles()->sync($validatedData['role']);
        }

        $this->notify([
            'title' => str_contains($this->formTitle, Constant::EDIT)
                ? 'User\'s Info Updated Successfully'
                : 'Temporary User Account Created Successfully',
            'body' => $this->editing->name
        ]);

        $this->hideModal('form');
    }

    public function confirmDelete(User $user)
    {
        $this->getDelModal("Delete User's Account", $user);
    }

    public function destroy()
    {
        if (User::count() > 1 && $this->selectedRecord->id !== 1) {
            DB::transaction(function () {
                $this->selectedRecord->roles()->detach($this->selectedRecord->abilities);
                $this->selectedRecord->delete();
            });
            $this->notify([
                'title' => 'Deleted Successfully',
                'body' => $this->selectedRecord->name
            ]);
        } else {
            $this->notify([
                'title' => 'This Account Cannot Deleted ',
                'body' => $this->selectedRecord->name
            ]);
        }

        $this->hideModal('del');
    }

    public function render()
    {
        return view('livewire.admin.users-component', [
            'users' => User::with('roles')->paginate(5),
            'roles' => Role::pluck('name', 'id')
        ])
            ->layout('layouts.admin');
    }
}
