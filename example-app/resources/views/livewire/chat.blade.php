<div>

<div class="flex justify-between mt-8">
    <div class="ml-4 w-1/4">
        <h2 class="text-lg font-bold mb-4">Usuarios</h2>
        <div class="bg-white rounded-lg shadow-md">
            <ul class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <li wire:click="selectUser({{ $user->id }})" class="cursor-pointer hover:bg-gray-100 flex items-center p-4">
                        <div class="bg-blue-500 rounded-full h-8 w-8 flex items-center justify-center text-white font-bold mr-3">{{ substr($user->name, 0, 1) }}</div>
                        <span class="text-gray-800">{{ $user->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex flex-col h-full w-1/2" style="padding: 10px;">
        <div class="flex justify-between items-center bg-gray-200 py-2 px-4 rounded-t-lg">
            <h2 class="text-lg font-bold">Mensajes</h2>
            @if ($Modal)
                <button wire:click="closeChat" class="ml-auto rounded-full bg-red-500 hover:bg-red-600 text-white transition-colors duration-300 focus:outline-none p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293A1 1 0 1 0 4.293 5.707L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 1 0 1.414-1.414L11.414 10z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        </div>

        @if ($Modal)
            <div class="bg-white rounded-b-lg flex flex-col justify-between h-full">
                <div class="px-4 py-2 border-b border-gray-200 flex-1 overflow-y-auto">
                    <div class="mb-2">
                        Usuario actual: <strong>{{ $selectedUser->name }}</strong>
                    </div>
                    <ul class="space-y-2" id="messageContainer">
                        @foreach ($messages as $message)
                            <li class="flex items-start">
                                <div class="{{ $message->isSent ? 'ml-auto bg-blue-500 text-white' : 'bg-gray-200' }} rounded-lg py-2 px-4 max-w-[75%]">
                                    {{ $message->message }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <form wire:submit.prevent="sendMessage" class="px-4 py-2 border-t border-gray-200">
                    <div class="flex">
                        <input type="text" wire:model="newMessage" placeholder="Escribe tu mensaje" class="flex-grow border border-gray-300 rounded-l p-2 focus:outline-none focus:ring focus:border-blue-500">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-r">Enviar</button>
                    </div>
                    @error('newMessage') <span class="text-red-500">{{ $message }}</span> @enderror
                </form>
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-full">
                <p class="text-gray-500">Selecciona una petición para empezar un chat.</p>
            </div>
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
