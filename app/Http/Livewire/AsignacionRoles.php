<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AsignacionRoles extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $selectedRoles = [];
    public $users;
    public $selectedUser;
    public $selectedRole;

    public function mount()
    {
        $this->users = User::all();
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
    public function register()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->selectedRoles);

        session()->flash('message', 'Usuario registrado exitosamente.');

        $this->reset();
    }

    public function render()
    {
        $roles = Role::all();

        return view('livewire.asignacion-roles', compact('roles'));
    }
}