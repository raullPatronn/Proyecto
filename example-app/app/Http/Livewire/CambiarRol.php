<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CambiarRol extends Component
{
    public $selectedRoles = [];
    public $users;
    public $selectedUser;
    public $selectedRole;

    public function mount()
    {
        $this->users = User::role('2')->get();
    }
    public function updateRole()
    {
        $user = User::find($this->selectedUser);

        if ($user) {
            $user->syncRoles($this->selectedRole);

            session()->flash('message', 'Rol actualizado exitosamente.');
        }

        $this->reset(['selectedUser', 'selectedRole']);

        
    }
    public function render()
    {
        $roles = Role::all();
        return view('livewire.cambiar-rol', compact('roles'));
    }
}
