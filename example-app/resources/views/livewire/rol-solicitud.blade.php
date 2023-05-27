<div>
    <div>
       <div class="flex items-center justify-center mt-32">
            <form wire:submit.prevent="updateRole" class="bg-white shadow-sm rounded-lg p-4">
                <div class="mb-3">
                    <label for="user" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Usuario:</label>
                    <select id="user" wire:model="selectedUser" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                        <option value="">Seleccione un usuario</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($selectedUser)
                    <div class="mb-3">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
                        <select id="role" wire:model="selectedRole" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($selectedUser && $selectedRole)
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Actualizar Rol</button>
                @endif
            </form>
        </div>


           @if (session()->has('message'))
                <div x-data="{ show: true }"
                     x-init="setTimeout(() => { show = false; }, 2000)"
                     x-show="show"
                     class="mt-4 flex items-center justify-center">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                </div>
            @endif
    </div>
</div>
