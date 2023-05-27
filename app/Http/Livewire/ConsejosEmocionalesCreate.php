<?php

namespace App\Http\Livewire;

use App\Models\ConsejoEmocional;
use Livewire\Component;
use Livewire\WithPagination;
class ConsejosEmocionalesCreate extends Component
{
    public $openModal = false;
    public $abrir = false;
    public $titulo;
    public $descripcion;
    public $limite = 100;
    public $mostrarModal = false;
    public $consejoSeleccionado;
    public $orden = 'desc'; // Dec



    protected $rules = [
        'titulo' => 'required|min:5|max:255',
        'descripcion' => 'required|min:5',
    ];

    public function guardar()
    {
        $this->validate();

        ConsejoEmocional::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
        ]);

        $this->titulo = '';
        $this->descripcion = '';

        session()->flash('mensaje', 'El consejo emocional se ha creado correctamente.');
    }
    public function abrirse($id)
    {
        
        $this->abrir = true;
        $this->mostrarModal = true;
        $this->consejoSeleccionado = ConsejoEmocional::findOrFail($id);

    }
    public function cerrar()
    {
        $this->abrir = false;
        $this->mostrarModal = false;
    }
    public function abrirModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->openModal = true;
    }
    public function mount()
{
    $this->dispatchBrowserEvent('abrirModal', ['delay' => 500]);
}
public function cambiarOrden()
    {
        $this->orden = $this->orden === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }
    public function cerrarModal()
    {
        $this->openModal = false;
        $this->mostrarModal = false;
    $this->consejoSeleccionado = null;
    }
   public function verMisConsejos()
{
    return redirect()->to('/mis-consejos');
}
 use WithPagination;
    public function render()
    {
        $consejos = ConsejoEmocional::orderBy('created_at', $this->orden)->paginate(6);
        return view('livewire.consejos-emocionales-create', compact('consejos'));
    }
}