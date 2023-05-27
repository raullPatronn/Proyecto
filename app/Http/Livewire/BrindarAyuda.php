<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SolicitudDeAyuda;
use Livewire\WithPagination;
class BrindarAyuda extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.brindar-ayuda', [
           'solicitudes' => SolicitudDeAyuda::paginate(10),
        ]);
    }
    public function irAChat($usuario_id)
    {
        return redirect()->to('/chat/');
    }
}
