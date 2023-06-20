<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConsejoEmocional;
use Illuminate\Support\Facades\Auth;
class MisConsejos extends Component
{
    public $solicitudes;
    public $editarId;
    public $limite = 100;
    public function render()
    {
        $usuarioId = Auth::id();
        $this->solicitudes = ConsejoEmocional::where('user_id', $usuarioId)->get();
        return view('livewire.mis-consejos', [
            'solicitudes' => $this->solicitudes,
        ]);
    
    }
}
