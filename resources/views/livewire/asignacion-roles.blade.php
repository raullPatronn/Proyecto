<div>
<div class="flex justify-center items-center py-32 inline-block">
    <form class="w-1/2 bg-white rounded-lg shadow-md p-8" wire:submit.prevent="register">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre:</label>
            <input type="text" id="name" wire:model="name" class="border border-gray-300 p-2 w-full rounded-md">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" wire:model="email" class="border border-gray-300 p-2 w-full rounded-md">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Contraseña:</label>
            <input type="password" id="password" wire:model="password" class="border border-gray-300 p-2 w-full rounded-md">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="border border-gray-300 p-2 w-full rounded-md">
            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="roles" class="block text-gray-700">Roles:</label>
            <select id="roles" wire:model="selectedRoles" multiple class="border border-gray-300 p-2 w-full rounded-md">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Registrar</button>
    </form>
</div>
</div>
