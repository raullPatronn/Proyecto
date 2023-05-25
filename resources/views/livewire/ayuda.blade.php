<div class="bg-gradient-to-b from-blue-200 to-rose-200 min-h-screen">
    <br>
    <div class="text-center">
        <h1 class="text-3xl font-bold bg-clip-text text-black font-serif italic" style="font-family: 'Playfair Display', serif;">Mis solicitudes de ayuda</h1>
    </div>
    <br>
    <!--- Boton Agregar--->
    <div class="relative">
       <button class="bg-white rounded-r-lg shadow-lg flex items-center justify-center h-12 w-12 hover:bg-indigo-700 transition duration-300 ease-in-out" wire:click="toggleModal">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-indigo-500">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
        </button>
    </div>
    <!--- Fonde de Corcho y el card que aparece en el fondo--->
      <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if($solicitudes->isEmpty())
            <div class="flex items-center text-center align-center justify-center h-full">
                <div class="block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 text-gray-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
            </svg>
                <p class="text-gray-400 text-lg">Aún no has solicitado una petición.</p>
            </div>
            </div>
        @else
        <!--- Card --->
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
                     buttons: false,
                     title: '¡Solicitud actualizada!',
                     text: '        ',
                     icon: 'success',
                     timer: 1000,
                   })">
                    Guardar
                    </button>
                <button wire:click="cancelarEdicion()" class="text-gray-500 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-gray-700">Cancelar</button>
                </div>
            @else
          <div class="font-bold text-xl mb-2 text-center">{{ $solicitud->titulo }}</div>
          <p class="text-gray-700 text-base mb-2 text-center">{{ $solicitud->descripcion }}</p>
          <p class="text-gray-700 text-base text-violet-700 mb-2"><strong>Ayuda Preferible:</strong> {{ $solicitud->ayuda }}</p>
            <div class="flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer mr-2" wire:click="editarSolicitud({{ $solicitud->id }})">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer"  wire:click="confEliminar({{ $solicitud->id }})">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
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
            @endif        
        </div>
    <!--- Modal de la solicitud--->
    <div class="flex items-center">
        @if ($openModal)
         <div class="fixed inset-0 transition-opacity">
                <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
            </div>
     <div class="fixed z-10 inset-0 overflow-y-auto animate__animated animate__bounceInDown">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
           
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 transform transition duration-500 ease-in-out scale-100 hover:scale-110">
                    <div class="text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Nueva solicitud
                        </h3>
                    </div>
                    <div class="mt-5">
                        <form wire:submit.prevent="crearSolicitud">
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
        <!---Modal Eliminar ---> 
    @foreach ($solicitudes as $solicitud)
    @if($conf == $solicitud->id)
        <div class="fixed z-50 inset-0 overflow-y-auto animate__animated animate__headShake" >
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-4 max-w-md w-full mx-auto">
                    <div class="flex justify-between items-center pb-3">
                        <h2 class="font-bold text-lg">Confirmar eliminación</h2>
                        <button type="button" class="text-gray-700 hover:text-gray-900 focus:outline-none" wire:click.prevent="cancelarEliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="py-2">
                        <p class="text-sm text-gray-500">¿Estás seguro de que deseas eliminar este elemento?</p>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button type="button" class="px-4 py-2 mr-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none" wire:click.prevent="eliminarSolicitud({{ $solicitud->id }})">Eliminar</button>
                        <button type="button" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md focus:outline-none" data-dismiss="modal" wire:click.prevent="cancelarEliminar">Cancelar</button> 
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
    @endif
    @endforeach
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
