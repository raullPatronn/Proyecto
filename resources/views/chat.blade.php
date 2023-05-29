<div>
<div>
    <h2>Chat</h2>
    <div>
        
        <div class="chat-window">
            <h3>Chat con {{ $selectedUser ? $selectedUser->name : 'ningún usuario seleccionado' }}</h3>
            <div class="messages">
                @foreach($messages as $message)
                <div class="message">
                    <p class="{{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">{{ $message->content }}</p>
                </div>
                @endforeach
            </div>
            <div class="message-input">
                <form wire:submit.prevent="sendMessage">
                    <input type="hidden" name="recipient_id" value="{{ $recipient->id }}">
                    <input type="text" name="message" wire:model="newMessage">
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script src="https://cdn.tailwindcss.com"></script>