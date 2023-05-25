<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
class Chat extends Component
{
    public $users;
    public $Modal = false;
    public $messages = [];
    public $selectedUser;
    public $newMessage;

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->id())
            ->whereHas('sentMessages', function ($query) {
                $query->where('receiver_id', auth()->id());
            })
            ->orWhereHas('receivedMessages', function ($query) {
                $query->where('sender_id', auth()->id());
            })
            ->get();

        $this->selectedUser = $this->users->first();

        $this->loadMessages();
    }
    public function loadMessages()
    {
    $this->messages = Message::where(function ($query) {
    $query->where('sender_id', auth()->id())
        ->where('receiver_id', $this->selectedUser->id ?? null);
    })->orWhere(function ($query) {
        $query->where('sender_id', $this->selectedUser->id ?? null)
            ->where('receiver_id', auth()->id());
    })->get();

    }

    public function sendMessage()
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->selectedUser->id,
            'message' => $this->newMessage,
        ]);

        $this->messages->push($message);
        $this->newMessage = '';
    }

    public function selectUser($userId)
    {
        $this->Modal = true;
        $this->selectedUser = $this->users->firstWhere('id', $userId);
        $this->loadMessages();
    }
    

    public function render()
    {
        return view('livewire.chat');
    }
}
