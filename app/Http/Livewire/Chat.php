<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
 

    public $ultimoMensaje = 'Hola, ¿cómo estás?';
    public $nombreUsuario = 'Pablito';
    public $hora = 'ahorita apenas';
    public function render()
    {
        return view('livewire.chat');
    }

    public function chat()
{
    $usuario = Auth::user();
    $conversacion = $usuario->conversaciones()->first(); // suponiendo que el usuario tiene al menos una conversación
    $ultimoMensaje = $conversacion->mensajes()->orderByDesc('created_at')->first();
    $nombreUsuario = $usuario->name;
    $hora = $ultimoMensaje ? $ultimoMensaje->created_at->format('H:i') : '';

    return view('chat', compact('usuario', 'conversacion', 'ultimoMensaje', 'nombreUsuario', 'hora'));
}

}