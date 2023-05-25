<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inicio extends Component
{
    public $opcionesMenu = [
        [
            'nombre' => 'Solicitar Ayuda Emocional',
            'ruta' => '/ayuda'
        ],
        [
            'nombre' => 'Consejos Emocionales',
            'ruta' => '/consejos'
        ],
        [
            'nombre' => 'Mis Chats',
            'ruta' => '/chat'
        ]
    ];

    public function render()
    {
        return view('livewire.inicio');
    }
}

