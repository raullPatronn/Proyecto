<div class="bg-gradient-to-b from-blue-200 to-rose-200 min-h-screen">
<br>
<div class="container">
    <h1 class="text-center my-5">Mis Consejos</h1>
</div>
<div class="animate__animated animate__bounceIn animate__delay-1s">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-10 translate-y-12">
  @foreach ($solicitudes as $solicitudes)
    <div class="bg-white rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl sm:w-full md:w-full xl:w-full">
      <div class="bg-violet-400 p-4 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
          <circle cx="10" cy="10" r="10" />
        </svg>
      </div>
      <div class="p-6">
        <h2 class="text-lg font-bold leading-tight mb-2">{{ $solicitudes->titulo }}</h2>
        <p class="text-gray-600 mt-2 leading-7">
          {{ strlen($solicitudes->descripcion) > $limite ? substr($solicitudes->descripcion, 0, $limite).'...' : $solicitudes->descripcion }}
          @if (strlen($solicitudes->descripcion) > $limite)
          <button wire:click.prevent="abrirse ({{ $solicitudes->id }}, '{{ $solicitudes->descripcion }}')" class="text-blue-500 cursor-pointer hover:underline focus:outline-none">Leer más</button>
          @endif
        </p>
        <div class="flex items-center justify-between">
          <div class="text-sm font-medium text-gray-500">
            {{ $solicitudes->autor }}
          </div>
        </div>
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
