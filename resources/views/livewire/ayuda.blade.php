<div class="bg-gradient-to-b from-blue-100 to-rose-100">
    <br>
    <div class="text-center">
        <h1 class="text-6xl font-bold bg-clip-text text-black font-serif" style="font-family: Georgia, serif;">Mis Solicitudes de Ayuda</h1>
    </div>
    <br>
    <!--- Fonde de Corcho y el card que aparece en el fondo--->

  <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach($solicitudes as $solicitud)
        <div class="bg-white rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
  <div class="p-6">
    @if($editarId == $solicitud->id)
      <input type="text" id="titulo" name="titulo" wire:model="titulo" placeholder="Título" class="w-full mb-2 text-gray-700 font-bold text-2xl">
      <textarea type="text" id="descripcion" name="descripcion" wire:model="descripcion" placeholder="Descripción" class="w-full mb-2 text-gray-700"></textarea>
      <select id="ayuda" wire:model="ayuda" autofocus class="w-full mb-2 text-gray-700">
        <option value="">Seleccione una opción</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
      <div class="flex justify-end">
        <button wire:click="actualizarSolicitud({{ $solicitud->id }})"
            class="text-green-500 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-green-700"
            onclick="event.preventDefault();
                var form = document.getElementById('actualizar-solicitud-form');
       swal({
         title: '¡Solicitud actualizada!',
         text: '{{ session('success') }}',
         icon: 'success',
       }).then(function() {
         form.submit();
       });">
        Guardar
      </button>
        <button wire:click="cancelarEdicion()" class="text-gray-500 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-gray-700">Cancelar</button>
      </div>
    @else
      <div class="font-bold text-xl mb-2">{{ $solicitud->titulo }}</div>
      <p class="text-gray-700 text-base mb-2">{{ $solicitud->descripcion }}</p>
      <p class="text-gray-700 text-base text-violet-700 mb-2"><strong>Ayuda Preferible:</strong> {{ $solicitud->ayuda }}</p>
      <div class="flex justify-end">
        <button wire:click="editarSolicitud({{ $solicitud->id }})" class="text-indigo-600 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-indigo-700">Editar</button>
        <button wire:click="eliminarSolicitud({{ $solicitud->id }})" class="text-red-500 font-bold focus:outline-none focus:shadow-outline hover:text-red-700">Eliminar</button>
        </div>
    @endif
  </div>
  <div class="px-6 py-2">
    <div class="flex justify-between items-center text-gray-500 text-xs">
      <span>{{ $solicitud->created_at->diffForHumans() }}</span>
      <span>{{ $solicitud->usuario->name }}</span>
    </div>
  </div>
</div>
            @endforeach
        </div>
    </div>
    <div class="relative">
       <button class="bg-white rounded-l-lg shadow-lg flex items-center justify-center h-12 w-12 hover:bg-indigo-700 transition duration-300 ease-in-out" wire:click="toggleModal">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-indigo-500">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
        </button>
</div>



<div class="flex items-center">
<!--- Modal de la solicitud--->
    @if ($openModal)
 <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 transform transition duration-500 ease-in-out scale-100 hover:scale-110">
                <div class="text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Nueva solicitud
                    </h3>
                </div>
                <div class="mt-5">
                    <form wire:submit.prevent="crearSolicitud" >
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="titulo">
                                Título:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('titulo') border-red-500 @enderror" id="titulo" wire:model="titulo" autofocus>
                            @error('titulo')
                                <script>
                                    swal("Error!", "Existen Campos Vacíos", "error");
                                </script>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="descripcion">
                                Descripción:
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('descripcion') border-red-500 @enderror" id="descripcion" rows="5" wire:model="descripcion"></textarea>
                            @error('descripcion')
                                <script>
                                    swal("Error!", "Existen Campos Vacíos", "error");
                                </script>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="ayuda">
                                Ayuda Preferible:
                            </label>
                            <select id="ayuda" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('ayuda') border-red-500 @enderror" wire:model="ayuda">
                                <option value="">Seleccione una opción</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            @error('ayuda')
                                <script>
                                    swal("Error!", "Existen Campos Vacíos", "error");
                                </script>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="text-indigo-600 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-indigo-700" type="submit" >
                                Crear Solicitud
                            </button>
                            
                            <button class="text-gray-500 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-gray-700" type="button" wire:click="cerrarModal">Cerrar</button>
                        </div>
                    </form>
                            </div>

                    </div>
                </div>

            </div>

        @endif

    </div>
   <!--- Pie de página--->
<footer class="bg-gray-800 text-white py-4 shadow-md fixed bottom-0 w-full">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center">
      <ul class="flex justify-center">
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
      <p class="text-xs text-gray-400">&copy; 2023 Nombre de la Empresa. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>
</div>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('solicitudCreada', () => {
            Swal.fire({
                title: 'Solicitud creada exitosamente!',
                icon: 'success',
                timer: 3000
            });
        });
    });
</script>
