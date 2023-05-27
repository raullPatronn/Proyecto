<div>

<div class="flex justify-between mt-8">
    <div class="w-2/4 block">
        <h1 class="text-2xl font-bold mb-2">Lista de Solicitudes</h1>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{ $solicitudes->links() }}
            </div>
        </div>
        <div class="mx-auto px-2 sm:px-6 lg:px-8 py-16 mb-40 mr-4">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
                @foreach($solicitudes as $solicitud)
                    <div class="bg-white rounded-lg shadow-lg transition duration-500 transform hover:scale-105 mb-4 ml-4">
                        <div class="p-6">
                            <h2 class="text-lg font-bold mb-2">{{ $solicitud->titulo }}</h2>
                            <p class="text-gray-700 mb-2">{{ $solicitud->descripcion }}</p>
                            <p class="text-violet-700 text-base mb-4"><strong>Ayuda Preferible:</strong> {{ $solicitud->ayuda }}</p>
                            <p class="text-gray-500 text-sm">{{ $solicitud->created_at->diffForHumans() }}</p>
                            <form wire:submit.prevent="startChatWithOwner({{ $solicitud->id }})">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Iniciar Chat
                                </button>
                            </form>
                        </div>
                        <div class="px-6 py-2 flex justify-between items-center text-gray-500 text-xs">
                            <span>{{ $solicitud->usuario->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex flex-col h-full w-1/2" style="padding: 10px;">
            <div class="flex justify-between">
                <h2 class="text-lg font-bold mb-4">Mensajes</h2>
                @if ($Modal)
                <button wire:click="closeChat" class="ml-auto rounded-full bg-gray-200 hover:bg-red-500 hover:text-white transition-colors duration-300 focus:outline-none p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L10 8.586 5.707 4.293A1 1 0 1 0 4.293 5.707L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 1 0 1.414-1.414L11.414 10z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        </div>

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
                    @error('newMessage') <span class="text-red-500">{{ $message }}</span> @enderror
                </form>
            </div>
        @else
            <p class="text-gray-500">Selecciona una petición para empezar un chat.</p>
        @endif
    </div>

</div>
@if ($showModal)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-4 rounded shadow-lg">
            <p class="mb-4">Ya has enviado un mensaje a este usuario.</p>
            <button wire:click="$set('showModal', false)" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Aceptar</button>
        </div>
    </div>
@endif

</div>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', function () {
            var container = document.getElementById('messageContainer');
            container.scrollTop = container.scrollHeight;
        });
    });

</script>
