<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SolicitudDeAyuda;
class Ayuda extends Component
{
   public $titulo;
    public $descripcion;
    public $ayuda;
    public $solicitudes;
    public $editarId;
    public $editando = false;
    public $conf = false;
    public $openModal = false;
    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:500',
        'ayuda' => 'required|string',
    ];

    public function render()
    {
        $usuarioId = Auth::id();
        $this->solicitudes = SolicitudDeAyuda::where('usuario_id', $usuarioId)->get();

        return view('livewire.ayuda', [
            'solicitudes' => $this->solicitudes,
            'editarId' => $this->editarId
        ]);
    }
    public function crearSolicitud()
    {
        $this->validate();

        SolicitudDeAyuda::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'ayuda' => $this->ayuda,
            'usuario_id' => Auth::id(),
        ]);
        
        $this->titulo = '';
        $this->descripcion = '';
        $this->ayuda = '';
        $this->openModal = false;
        
    }
     public function editarSolicitud($id)
    {
        $solicitud = SolicitudDeAyuda::findOrFail($id);

        $this->titulo = $solicitud->titulo;
        $this->descripcion = $solicitud->descripcion;
        $this->ayuda = $solicitud->ayuda;
        $this->editarId = $id;
        $this->editando = true;
    }

    public function actualizarSolicitud()
    {
        $this->validate();

        $solicitud = SolicitudDeAyuda::findOrFail($this->editarId);

        $solicitud->titulo = $this->titulo;
        $solicitud->descripcion = $this->descripcion;
        $solicitud->save();
        $this->titulo = '';
        $this->descripcion = '';
        $this->editarId = null;
         $this->editando = false;
    }
    public function confEliminar($id)
    {
    $this->conf = true;
    $solicitud = SolicitudDeAyuda::findOrFail($id);
    }
    public function eliminarSolicitud($id)
    {
        $solicitud = SolicitudDeAyuda::findOrFail($id);

        $solicitud->delete();
        $this->conf = false;
    }
    public function cancelarEliminar()
{
    // Cerrar el modal de confirmación
    $this->conf = false;
}
     public function cancelarEdicion()
    {
        $this->titulo = '';
        $this->descripcion = '';
        $this->ayuda = '';
        $this->editarId = null;
        $this->editando = false;
    }
    public function toggleModal()
{
    $this->openModal = !$this->openModal;
}
    public function abrirModal()
    {

        $this->openModal = true;
    }
    public function cerrarModal()
{
    $this->reset();
    $this->emit('cerrarModal');
    $this->reiniciarValores();
}

public function reiniciarValores()
{
    $this->descripcion = '';
    $this->ayuda = '';
    $this->resetErrorBag();
}
}
