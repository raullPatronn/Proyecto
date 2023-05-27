<div class="bg-gradient-to-b from-blue-100 to-rose-100"> 
<div class="flex flex-col h-screen">
    <!-- Header -->
    <div class="bg-gray-200 py-4 px-6 flex items-center justify-between">
        <h1 class="text-xl font-bold">Nombre del Chat</h1>
        <span class="text-gray-600">Conectado como {{ auth()->user()->name }}</span>
    </div>

    <!-- Chat messages -->
    <div class="flex-1 bg-gray-100 p-4 overflow-y-auto">
        <div class="flex flex-col space-y-4">
            <!-- Chat message (received) -->
            <div class="flex items-end">
                <div class="flex flex-col items-start max-w-xs mx-2">
                    <div class="bg-white rounded-lg py-2 px-4 shadow-md">
                        <p class="text-gray-800">{{ $ultimoMensaje }}</p>
                    </div>
                    <div class="text-gray-600 text-sm mt-1">{{ $nombreUsuario }} • {{ $hora }}</div>
                </div>
                <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-full h-8 w-8 mx-2">
            </div>

            <!-- Chat message (sent) -->
            <div class="flex items-end justify-end">
                <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-full h-8 w-8 mx-2">
                <div class="flex flex-col items-end max-w-xs mx-2">
                    <div class="bg-teal-500 rounded-lg py-2 px-4 shadow-md">
                        <p class="text-white">{{ $ultimoMensaje }}</p>
                    </div>
                    <div class="text-gray-600 text-sm mt-1">{{ $nombreUsuario }} • {{ $hora }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message input -->
    <form class="bg-gray-200 py-2 px-4 flex items-center" method="POST" >
        @csrf
        <input type="text" name="mensaje" placeholder="Escribe tu mensaje" class="flex-1 border border-gray-400 rounded-lg py-2 px-4 mr-2">
        <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white rounded-lg py-2 px-4">Enviar</button>
    </form>
</div>


</div>
<script src="https://cdn.tailwindcss.com"></script>