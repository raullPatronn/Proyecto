<x-guest-layout>
    <x-authentication-card>
        

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

       <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm mx-auto bg-white rounded-md shadow-md p-6">
    @csrf

    <div class="mb-4">
        <x-label for="email" value="{{ __('Correo') }}" />
        <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
    </div>

    <div class="mb-4">
        <x-label for="password" value="{{ __('Contraseña') }}" />
        <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password" autocomplete="current-password" />
    </div>

    <div class="mb-4 flex items-center">
        <label for="remember_me" class="flex items-center">
            <x-checkbox id="remember_me" name="remember" class="mr-2" />
            <span class="text-sm text-gray-600">{{ __('Recordar') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-between">
    <div class="flex items-center mt-4">
        @if (Route::has('password.request'))
            <div class="mr-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            </div>
        @endif
        <div>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __('¿No estás registrado?') }}
            </a>
        </div>
    </div>
</div>

<x-button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
    {{ __('Iniciar Sesión') }}
</x-button>


</form>

    </x-authentication-card>
</x-guest-layout>
