<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class ChatController extends Controller
{
    public function start(Request $request)
    {
        // Obtén el ID del usuario destinatario desde el formulario
        $recipientId = $request->input('recipient_id');

        // Verifica si el usuario destinatario tiene el rol 1
        $recipient = User::where('id', $recipientId)
            ->whereHas('roles', function ($query) {
                $query->where('id', 1);
            })
            ->first();

        // Si el usuario destinatario con rol 1 existe, redirige a la ventana de chat
        if ($recipient) {
            // Redirige a la ruta de la vista de chat y pasa el ID del usuario destinatario
            return redirect()->route('chat.view', ['recipient_id' => $recipientId]);
        } else {
            // Si el usuario no tiene el rol 1, muestra un mensaje de error o realiza otra acción
            return back()->with('error', 'El usuario seleccionado no cumple los requisitos para el chat.');
        }
    }

    public function view(Request $request, $recipientId)
    {
        // Obtén los mensajes y el usuario destinatario para la vista de chat
        $messages = Message::where(function ($query) use ($recipientId) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $recipientId);
        })->orWhere(function ($query) use ($recipientId) {
            $query->where('sender_id', $recipientId)
                ->where('receiver_id', auth()->id());
        })->get();

        $recipient = User::find($recipientId);
        
        // Obtén la lista de usuarios con el rol 1
        $users = User::role(1)->get();

        $selectedUser = $recipient;

        return view('chat', compact('messages', 'recipient', 'users', 'selectedUser'));
    }
    public function sendMessage(Request $request)
{
    $this->validate($request, [
        'message' => 'required|string',
        'recipient_id' => 'required|exists:users,id',
    ]);

    $message = new Message();
    $message->sender_id = auth()->id();
    $message->receiver_id = $request->input('recipient_id');
    $message->message = $request->input('message');
    $message->save();

    return redirect()->back()->with('success', 'Mensaje enviado exitosamente.');
}

}
