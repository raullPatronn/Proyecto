<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolSolicitud extends Component
{
    public $selectedUser;
    public $selectedRole;
    public $users;

    public function mount()
    {
        $this->users = User::role('1')->take(10)->get();
    }

    public function updateRole()
    {
        $user = User::find($this->selectedUser);

        if ($user) {
            $user->syncRoles($this->selectedRole);

            session()->flash('message', 'Rol actualizado exitosamente.');
        }

        $this->reset(['selectedUser', 'selectedRole']);
        return redirect()->to('rol-solicitud');
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.rol-solicitud', compact('roles'));
    }
}
