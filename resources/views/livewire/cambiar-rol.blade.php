<div>
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Usuarios del rol 1</h2>

                @if ($users->count() > 0)
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-2 py-2">{{ $user->name }}</td>
                                    <td class="border px-2 py-2">{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="mt-4">No hay usuarios disponibles.</p>
                @endif
            </div>
        </div>

        <div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Actualizar Rol</h2>

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

                <form wire:submit.prevent="updateRole">
                    <div class="mb-4">
                        <label for="user" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar Usuario:</label>
                        <select id="user" wire:model="selectedUser" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                            <option value="">Seleccione un usuario</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if ($selectedUser)
                        <div class="mb-4">
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
        </div>
    </div>
</div>
<br>
</div>
