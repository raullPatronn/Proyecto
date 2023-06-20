<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Spatie\Permission\Models\Role;

class ModalMessage extends Component
{
    public $showModal = false;
    public $roles;
    public $selectedRoleId;

    public function mount()
    {
        $userId = auth()->id();

        // Verificar si el usuario ha visto el mensaje modal en la cookie
        $cookieName = 'modal_seen_' . $userId;
        if (!Cookie::has($cookieName)) {
            // Verificar si el usuario ha visto el mensaje modal en la base de datos
            if (!auth()->user()->modal_seen) {
                $this->showModal = true;
            }
        }

        // Obtener los primeros dos roles
        $this->roles = Role::take(2)->get();
    }

    public function guardarRol()
{
    // Obtener el rol seleccionado
    $rol = Role::find($this->selectedRoleId);

    // Verificar si se ha seleccionado un rol válido
    if ($rol) {
        // Asignar el nuevo rol al usuario actual
        auth()->user()->syncRoles([$rol->name]);
        
        $userId = auth()->id();
        $cookieName = 'modal_seen_' . $userId;

        // Guardar el estado 'modal_seen' del usuario en la base de datos
        auth()->user()->update(['modal_seen' => true]);

        // Guardar el estado 'modal_seen' del usuario en una cookie
        Cookie::queue($cookieName, true, 1440); // La cookie expirará en 1440 minutos (1 día)

        $this->showModal = false;
        // Redirigir al usuario a la página deseada después de cambiar el rol
        return redirect()->route('dashboard');
    }
}

    public function closeModal()
    {
        $userId = auth()->id();
        $cookieName = 'modal_seen_' . $userId;

        // Guardar el estado 'modal_seen' del usuario en la base de datos
        auth()->user()->update(['modal_seen' => true]);

        // Guardar el estado 'modal_seen' del usuario en una cookie
        Cookie::queue($cookieName, true, 1440); // La cookie expirará en 1440 minutos (1 día)

        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal-message');
    }
}
