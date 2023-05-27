<div class="bg-gradient-to-b from-blue-100 to-rose-100 h-screen">
    <br>

    <div class="flex justify-center items-center mb-3 animate__animated animate__bounceIn">
        <button class="bg-gray-800 text-white px-3 py-2 rounded-md mr-2" wire:click.prevent="cambiarOrden" wire:click="resetPage">Cambiar orden</button>
        <span class="text-black">Orden actual: {{ strtoupper($orden) }}</span>
    </div>

    <div class="bottom-20 w-full">
        {{ $consejos->links() }}
    </div>
    <br>
    <!--- Card Consejos-->
 <div class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-10">
    @foreach ($consejos as $consejo)
    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl">
        <div class="bg-violet-400 p-4 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
                <circle cx="10" cy="10" r="10" />
            </svg>
        </div>
        <div class="border rounded-lg shadow-lg p-4 mb-4">
            <h2 class="text-lg font-bold">{{ $consejo->titulo }}</h2>
            <p class="text-gray-600 mt-2 leading-7">
                {{ strlen($consejo->descripcion) > $limite ? substr($consejo->descripcion, 0, $limite).'...' : $consejo->descripcion }}
                @if (strlen($consejo->descripcion) > $limite)
                <button wire:click.prevent="abrirse ({{ $consejo->id }}, '{{ $consejo->descripcion }}')" class="text-blue-500 cursor-pointer hover:underline focus:outline-none">Leer más</button>
                @endif
            </p>
        </div>
        <div class="bg-gray-200 p-4 flex items-center justify-between">
            <div class="text-sm font-medium text-gray-500">
                {{ $consejo->autor }}
            </div>
            <button class="bg-violet-400 hover:bg-purple-500 text-white font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:bg-violet-600">Compartir</button>
        </div>
    </div>
    @endforeach
</div>

    <br>
<!---Modal Leer más-->
@if ($abrir)
    <div wire:ignore.self class="modal fade" id="modal-leer-mas" tabindex="-1" role="dialog" aria-labelledby="modal-leer-mas-title" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered fixed top-20 left-1/2 transform -translate-x-1/2" role="document">
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


<br>
<!--- Botones -->
<div class=" flex justify-between w-full ">
    <div class="bg-gray-500 rounded-md p-2 mr-2">
        <button id="btnAbrirModal" class="bg-violet-400 text-white hover:bg-violet-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex items-center justify-center" wire:click="abrirModal">

            <span>Escribir Consejo</span>
            <svg class="animate-bounce ml-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 6.414V16a1 1 0 11-2 0V6.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="bg-gray-500 rounded-md p-2 ml-2">
        <button class="bg-violet-400 hover:bg-violet-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 flex items-center justify-center" wire:click="verMisConsejos">
            <span>Mis Consejos</span>
            <svg class="animate-bounce ml-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 6.414V16a1 1 0 11-2 0V6.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>
<!--- Modal Formulario-->
@if ($openModal)
    <div class="fixed z-50 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            </div>
     <div class="bg-white rounded-lg shadow-xl p-8 transform transition duration-500 ease-in-out scale-100 hover:scale-110">
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
                wire:model.lazy="titulo"
            >
            @error('titulo') 
                <script>
                    swal("Error!", "Existen Campos Vacíos", "error");
                </script> 
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="descripcion">
                Descripción
            </label>
            <textarea
                class="appearance-none border rounded w-full py-2 px-3 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('descripcion') border-red-500 @enderror"
                id="descripcion"
                wire:model.lazy="descripcion"
            ></textarea>
            @error('descripcion') 
                <script>
                    swal("Error!", "Existen Campos Vacíos", "error");
                </script> 
            @enderror
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
  
@endif
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

