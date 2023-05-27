<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuEmocional extends Component
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
        return view('livewire.menu-emocional');
    }

}
