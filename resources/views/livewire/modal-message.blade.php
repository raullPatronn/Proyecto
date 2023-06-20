<div>
<div>
    @if($showModal)
        <!-- Aquí va el contenido del mensaje modal -->
    <div class="flex items-center">

        <div class="fixed inset-0 transition-opacity">
                <div class="fixed inset-0 z-40 bg-black opacity-25"></div>
            </div>
     <div class="fixed z-10 inset-0 overflow-y-auto animate__animated animate__bounceInDown">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 transform transition duration-500 ease-in-out scale-100 hover:scale-110">
        <div class="text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Seleccionar Rol
            </h3>
        </div>
        <div>
            <form wire:submit.prevent="guardarRol" class="mt-4">
                <select wire:model="selectedRoleId" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecciona un rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar
                </button>
                  @role('Super-Admin')
                    <button class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click="closeModal">Cerrar</button>
                @endrole
                @role('admin')
                    <button class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click="closeModal">Cerrar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
                </div>        
        </div> 
    @endif
</div>

</div>
