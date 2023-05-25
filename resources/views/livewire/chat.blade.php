<div>

<div class="flex justify-between mt-8">
    <div class="w-1/4">
        <h2 class="text-lg font-bold mb-4">Usuarios</h2>
        <ul class="space-y-2">
            @foreach ($users as $user)
                <li wire:click="selectUser({{ $user->id }})" class="cursor-pointer hover:bg-gray-100 rounded p-2 flex items-center">
                    <div class="bg-blue-500 rounded-full h-8 w-8 flex items-center justify-center text-white font-bold mr-2">{{ substr($user->name, 0, 1) }}</div>
                    <span>{{ $user->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex flex-col h-full w-3/4">
        <h2 class="text-lg font-bold mb-4">Mensajes</h2>
        @if ($Modal)
            <div class="bg-gray-100 rounded-lg p-4 flex-1">
                <div class="mb-4">
                    Usuario actual: <strong>{{ $selectedUser->name }}</strong> 
                </div>
                <ul class="space-y-2 max-h-[500px] overflow-y-auto" id="messageContainer">
                    <div>
                        @foreach ($messages as $message)
                            <div class="flex mb-4 {{ $message->isSent ? 'justify-end' : 'justify-start' }}">
                                <div class="{{ $message->isSent ? 'bg-blue-500 text-white' : 'bg-gray-200' }} rounded-lg p-2">
                                    {{ $message->message }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </ul>

                <form wire:submit.prevent="sendMessage" class="mt-4">
                    <div class="flex">
                        <input type="text" wire:model="newMessage" placeholder="Escribe tu mensaje" class="w-full border border-gray-300 rounded-l p-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-r">Enviar</button>
                    </div>
                </form>
            </div>
        @else
            <p class="text-gray-500">Selecciona un usuario para ver los mensajes.</p>
        @endif
    </div>
</div>

</div>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', function () {
            var container = document.getElementById('messageContainer');
            container.scrollTop = container.scrollHeight;
        });
    });

</script>
