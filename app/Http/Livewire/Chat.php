<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChatMessage;
use App\Http\Livewire\Chat;

class Chat extends Component
{

    public function render()
    {
        return view('livewire.chat');
    }
}