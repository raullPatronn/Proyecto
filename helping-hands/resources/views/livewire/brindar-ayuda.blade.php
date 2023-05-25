<div class="bg-gradient-to-b from-blue-200 to-rose-200 min-h-screen">
<h1 class="text-2xl font-bold mb-4">Lista de Solicitudes</h1>
<br>
<div class=" mx-auto px-4 sm:px-6 lg:px-8 py-16">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($solicitudes as $solicitud)
        <div class="bg-white rounded-lg shadow-lg transition duration-500 transform hover:scale-105 mb-4">
            <div class="p-6">
                <h2 class="text-lg font-bold mb-2">{{ $solicitud->titulo }}</h2>
                <p class="text-gray-700 mb-2">{{ $solicitud->descripcion }}</p>
                <p class="text-violet-700 text-base mb-4"><strong>Ayuda Preferible:</strong> {{ $solicitud->ayuda }}</p>
                <p class="text-gray-500 text-sm">{{ $solicitud->created_at->diffForHumans() }}</p>
                <button type="button" class="btn btn-primary" wire:click="irAChat({{ $solicitud->id }})">
                    <strong>Brindar Una Mano</strong>
                </button>
            </div>
            <div class="px-6 py-2 flex justify-between items-center text-gray-500 text-xs">
                <span>{{ $solicitud->usuario->name }}</span>
            </div>
        </div>
    @endforeach
</div>
</div>
</div>
 <!--- Pie de página--->
<footer class="bg-gray-800 text-white py-4 shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-center">
      <ul class="flex justify-center sm:justify-start">
        <li class="mr-6">
          <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Facebook</a>
        </li>
        <li class="mr-6">
          <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Twitter</a>
        </li>
        <li class="mr-6">
          <a href="#" class="hover:text-indigo-500 transition-colors duration-300">Instagram</a>
        </li>
        <li>
          <a href="#" class="hover:text-indigo-500 transition-colors duration-300">LinkedIn</a>
        </li>
      </ul>
      <p class="text-xs text-gray-400 sm:ml-6 mt-4 sm:mt-0">&copy; 2023 Nombre de la Empresa. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>
<script src="https://cdn.tailwindcss.com"></script>