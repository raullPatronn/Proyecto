<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;

class VistaAdmin extends Component
{
    public $countRole1;
    public $countRole2;

    public function mount()
    {
        $this->countRole1 = $this->getUsersCountByRole(1);
        $this->countRole2 = $this->getUsersCountByRole(2);
    }

    public function getUsersCountByRole($roleId)
    {
        return User::role($roleId)->count();
    }

    public function render()
    {
        return view('livewire.vista-admin');
    }
}
