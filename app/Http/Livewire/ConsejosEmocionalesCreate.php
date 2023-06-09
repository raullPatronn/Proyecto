<?php

namespace App\Http\Livewire;

use App\Models\ConsejoEmocional;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ConsejosEmocionalesCreate extends Component
{
    use LivewireAlert;
    public $openModal = false;
    public $abrir = false;
    public $conf = false;
    public $adminModal = false;
    public $titulo;
    public $descripcion;
    public $limite = 100;
    public $mostrarModal = false;
    public $consejoSeleccionado;
    public $orden = 'desc'; // Dec
    public function rules()
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
        ];
    }



    protected $rules = [
        'titulo' => 'required|min:5|max:255',
        'descripcion' => 'required|min:5',
    ];

    public function guardar()
    {
        $this->validate([
    'titulo' => 'required',
    'descripcion' => 'required',
    ], [
        'titulo.required' => 'El título está vacío',
        'descripcion.required' => 'La descripción está vacía',
    ]);

        ConsejoEmocional::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'user_id' => Auth::id(),
        ]);
        
        $this->titulo = '';
        $this->descripcion = '';
        $this->openModal = false;
        $this->alert('success', 'Solicitud creada',['timer' => 1500,]); 
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
    $this->solicitudes = ConsejoEmocional::where('user_id', Auth::id())->orderByDesc('created_at')->get();
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
    public function confEliminar($id)
{
    $this->conf = true;
    $this->consejoEliminar = $id;
}
 public function confirmEliminar($id)
{
    $this->adminModal = true;
    $this->consejoEliminar = $id;
}

public function eliminar()
{
    $consejoEmocional = ConsejoEmocional::where('id', $this->consejoEliminar)->where('user_id', Auth::id())->first();

    if ($consejoEmocional) {
        $consejoEmocional->delete();
    }

    // Cerrar el modal de confirmación
    $this->conf = false;
    $this->cerrar();
    $this->alert('warning', 'Elemento eliminado',['timer' => 1500,]);
}
public function eliminartodo()
{
    $consejoEmocional = ConsejoEmocional::find($this->consejoEliminar);

    if ($consejoEmocional) {
        $consejoEmocional->delete();
    }

    // Cerrar el modal de confirmación
    $this->conf = false;
    $this->cerrar();
    $this->alert('warning', 'Elemento eliminado', ['timer' => 1500]);
}

public function cancelarEliminar()
{
    // Cerrar el modal de confirmación
    $this->conf = false;
    $this->cerrar();
}
use WithPagination;
    public function render()
    {
        $consejos = ConsejoEmocional::orderBy('created_at', $this->orden)->paginate(6);
        return view('livewire.consejos-emocionales-create', compact('consejos'));
    }
}