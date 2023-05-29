<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\SolicitudDeAyuda;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;


class BrindarAyuda extends Component
{
    use WithPagination;

    public $users;
    public $Modal = false;
    public $messages = [];
    public $selectedUser;
    public $newMessage;
    public $chatStarted = false;
    public $showModal = false;
    public $chatOpened = false;
    
    public function rules()
    {
        return [
            'newMessage' => 'required',
        ];
    }


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

    public function startChatWithOwner($solicitudId)
    {
        $solicitud = SolicitudDeAyuda::findOrFail($solicitudId);
        $owner = $solicitud->usuario;
        $this->selectedUser = $owner;
        $this->loadMessages();
        $this->chatStarted = true;
        $this->Modal = true;
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required',
        ], [
            'newMessage.required' => 'El campo está vacío',
        ]);

        // Verificar si ya existe un mensaje enviado por el usuario actual al destinatario seleccionado
        $existingMessage = Message::where('sender_id', auth()->id())
            ->where('receiver_id', $this->selectedUser->id)
            ->first();

        // Si ya existe un mensaje, mostrar el modal y detener el flujo
        if ($existingMessage) {
            $this->showModal = true;
            return;
        }

        // Crear y guardar el nuevo mensaje
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
    public function closeChat()
    {
        $this->Modal = false;
        $this->chatStarted = false;
    }

    public function render()
    {
        return view('livewire.brindar-ayuda', [
            'solicitudes' => SolicitudDeAyuda::orderBy('created_at', 'desc')->paginate(6),
        ]);
    }
}
