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
    public function irAChat($solicitudId)
{
    $solicitud = SolicitudDeAyuda::findOrFail($solicitudId);
    $dueñoCardId = $solicitud->usuario_id;
       
    if (auth()->id() == $dueñoCardId) {
        return redirect('/chat/'.$solicitudId);
    } else {
        alert: "no hay nadaaa";
}

}
}