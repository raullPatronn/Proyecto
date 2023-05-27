<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
class Inicio extends Component
{
    public $showModal = false;
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

    public $opcionesMenu2 = [
        [
            'nombre' => 'Brindar Ayuda',
            'ruta' => '/brindar'
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
    public $opcionesMenu3 = [
        [
            'nombre' => 'Ver Solicitues',
            'ruta' => '/Solicitues'
        ],
        [
            'nombre' => 'Consejos Emocionales',
            'ruta' => '/consejos'
        ],
        [
            'nombre' => 'Chats Generales',
            'ruta' => '/chat'
        ]
    ];
    public $opcionesRedirect = [
        [
            'nombre' => 'Mis Roles',
            'ruta' => '/roles'
        ],
        
    ];
    
    public function render()
    {
        return view('livewire.inicio');
    }
}

