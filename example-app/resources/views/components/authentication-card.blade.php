<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sky-200">
    <div>
      <img src="{{asset('img/formulario.png')}}" alt="formulario_img" width="300" height="300">
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-blue-300 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>