<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
class VistaChat extends Component
{
    public $users;

    public function getAllRelatedUsers()
{
    $sentMessagesUsers = auth()->user()->sentMessages()->with('receiver')->get()->pluck('receiver');
    $receivedMessagesUsers = auth()->user()->receivedMessages()->with('sender')->get()->pluck('sender');

    return $sentMessagesUsers->merge($receivedMessagesUsers)->unique();
}

    public function render()

    {
        return view('livewire.vista-chat', compact('relatedUsers'));
    }
}
