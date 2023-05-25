<div>
    <div class="flex justify-center items-center mb-3 animate__animated animate__bounceIn mt-4">
        <button class="bg-gray-800 text-white px-3 py-2 rounded-md mr-2" wire:click.prevent="cambiarOrden" wire:click="resetPage">Orden: {{ strtoupper($orden) }}</button>
    </div>
    <br>
    <!--- Botones -->
   <livewire:btn-regresar />
    <div class="flex items-center mx-8 mt-8">
        <button wire:click="abrirModal">
        <livewire:btn-agregar />
        </button>
    </div>
        <!--- Card Consejos-->
    <div class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-10 translate-y-12">
      @foreach ($consejos as $consejo)
        <div class="bg-white rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl sm:w-full md:w-full xl:w-full">
          <div class="bg-violet-400 p-4 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
              <circle cx="10" cy="10" r="10"/>
            </svg>
          </div>
          <div class="p-6">
            <h2 class="text-lg font-bold leading-tight mb-2">{{ $consejo->titulo }}</h2>
            <p class="text-gray-600 mt-2 leading-7">
              {{ strlen($consejo->descripcion) > $limite ? substr($consejo->descripcion, 0, $limite).'...' : $consejo->descripcion }}
              @if (strlen($consejo->descripcion) > $limite)
              <button wire:click.prevent="abrirse ({{ $consejo->id }}, '{{ $consejo->descripcion }}')" class="text-blue-500 cursor-pointer hover:underline focus:outline-none">Leer más</button>
              @endif
            </p>
        @role('Brindar-Ayuda')     
        @if($consejo->user_id == Auth::id())
            <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="confEliminar({{ $consejo->id }})">Eliminar</button>
        @endif
        @endrole
        @role('Solicitar-Ayuda')     
        @if($consejo->user_id == Auth::id())
            <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="confEliminar({{ $consejo->id }})">Eliminar</button>
        @endif
        @endrole
        @role('admin|Super-Admin')     
            <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="confEliminar({{ $consejo->id }})">Eliminar</button>
        @endrole
          </div>
        </div>
      @endforeach
    </div>
           <div class="text-center justify-center items-center grid-cols-3 flex mt-20 mb-16">
                <div>{{ $consejos->links() }}</div>
            </div>
    <!---Modal Eliminar Admin ---> 
    @role('admin|Super-Admin')
    @foreach ($consejos as $consejo)
    @if($conf)
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
                        <button type="button" class="px-4 py-2 mr-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none" wire:click.prevent="eliminartodo({{ $consejo->id }})">Eliminar</button>
                        <button type="button" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md focus:outline-none" data-dismiss="modal" wire:click.prevent="cancelarEliminar">Cancelar</button> 
                    </div>
                </div>
            </div>
        </div>
    <div class="fixed inset-0 z-40 bg-black opacity-5"></div>
    @endif
    @endforeach
    @endrole
    <!---Modal Eliminar ---> 
    @foreach ($consejos as $consejo)
    @if($conf && $consejoEliminar == $consejo->id)
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
                        <button type="button" class="px-4 py-2 mr-2 text-white bg-red-500 hover:bg-red-600 rounded-md focus:outline-none" wire:click.prevent="eliminar({{ $consejo->id }})">Eliminar</button>
                        <button type="button" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-md focus:outline-none" data-dismiss="modal" wire:click.prevent="cancelarEliminar">Cancelar</button> 
                    </div>
                </div>
            </div>
        </div>
    <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
    @endif
    @endforeach
        <!---Modal Leer más-->
        @if ($abrir)
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
            <div wire:ignore.self class="modal fade animate__animated animate__bounceInDown" id="modal-leer-mas" tabindex="-1" role="dialog" aria-labelledby="modal-leer-mas-title" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered fixed bottom-44 right-96 mr-44 transform" role="document">
                    <div class="modal-content bg-white rounded-lg shadow-xl p-8 w-5/6 md:max-w-2xl">
                        <div class="modal-header">
                            <h5 class="modal-title text-lg font-bold text-black mb-2" id="modal-leer-mas-title">{{ $consejoSeleccionado ? $consejoSeleccionado->titulo : '' }}</h5>
                            <button type="button" class="close focus:outline-none" data-dismiss="modal" aria-label="Close">
                           
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-gray-700">{{ $consejoSeleccionado ? $consejoSeleccionado->descripcion : '' }}</p>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary bg-rose-400 text-white hover:bg-violet-600 text-white font-bold py-2 px-4 rounded shadow transition duration-300 transform hover:-translate-y-1 hover:scale-110 ease-out" data-dismiss="modal" wire:click="cerrar" >Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <!--- Modal Formulario-->
            @if ($openModal)
                <div class="fixed z-50 inset-0 overflow-y-auto ">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="fixed inset-0 transition-opacity">
                            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
                        </div>
                <div class="animate__animated animate__flipInX">
                 <div class=" bg-white rounded-lg shadow-xl p-8 transform transition duration-500 ease-in-out scale-100 hover:scale-110 ">
                <h3 class="text-xl leading-6 font-medium text-gray-900 mb-4">
                    ¿Deseas Brindar un Consejo?
                </h3>
                <form wire:submit.prevent="guardar">
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2" for="titulo">
                            Título
                        </label>
                        <input
                            class="appearance-none border rounded w-full py-2 px-3 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('titulo') border-red-500 @enderror"
                            id="titulo"
                            type="text"
                            wire:model.lazy="titulo">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2" for="descripcion">
                            Descripción
                        </label>
                        <textarea
                            class="appearance-none border rounded w-full py-2 px-3 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('descripcion') border-red-500 @enderror"
                            id="descripcion"
                            wire:model.lazy="descripcion"></textarea>
                    </div>
                    <div class="flex items-center justify-end mt-8">
                        <button
                            class="text-indigo-600 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-indigo-700"
                            type="submit">
                            Guardar
                        </button>
                        <button 
                            class="text-gray-500 font-bold mr-2 focus:outline-none focus:shadow-outline hover:text-gray-700" 
                            wire:click="cerrarModal" 
                            type="button"
                        >
                            Cancelar
                        </button>
                    </div>
                </form>
                    </div>
                </div>
                    </div>
                </div> 
            @endif
</div> 
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script>
  

  function openModal(description) {
    document.getElementById("modal").classList.remove("hidden");
    document.getElementById("modal-description").textContent = description;
  }

  function closeModal() {
    document.getElementById("modal").classList.add("hidden");
  }

  document.querySelectorAll(".read-more").forEach(function(button) {
    button.addEventListener("click", function() {
      var description = this.getAttribute("data-descripcion");
      openModal(description);
    });
  });

</script>

