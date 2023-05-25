@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script
    src="https://code.jquery.com/jquery-3.6.4.js"
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
      $(document).ready(function() {
    var wordCarousel = $('#word-carousel'); // Obtener el elemento del carrusel
    var wordsList = ['¿No prestas atencion?', '¿Sientes que no estas en tu mejor momento?', 'Llegaste al lugar correcto', 'Bienvenido a Helping Hands']; // Agrega más palabras según sea necesario
    var currentWordIndex = 0;
  
    function changeWord() {
      wordCarousel.fadeOut(500, function() { // Desvanecer el texto actual
        wordCarousel.text(wordsList[currentWordIndex]).fadeIn(500); // Cambiar el texto y hacerlo aparecer suavemente
        currentWordIndex = (currentWordIndex + 1) % wordsList.length; // Incrementar el índice
      });
    }
  
    var intervalId = setInterval(changeWord, 3500); // Iniciar el carrusel
  
    wordCarousel.hover(function() { // Detener el carrusel al hacer hover
      clearInterval(intervalId);
    }, function() { // Reiniciar el carrusel al quitar el hover
      intervalId = setInterval(changeWord, 3500);
    });
  });
  </script>

   <!--- Primera sección--->
<div class="bg-sky-200  min-h-screen">
<div class="flex items-center justify-center">
  <div class="container mx-auto px-4 mt-8">
    <div class="max-w-lg mx-auto text-center">
      <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-black mb-8" id="word-carousel">¿No estas en tu mejor momento?</h2>
      <p class="text-gray-900 text-xl md:text-2xl mb-12">Encuentra apoyo emocional y comparte tus experiencias con personas que comprenden tus desafíos.</p>
      <div class="flex justify-center space-x-4">
        @if (Route::has('login'))
          <div class="flex flex-col space-y-4">
            @auth
              <a href="{{ url('/dashboard') }}" class="font-semibold text-white bg-purple-700 hover:bg-purple-600 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Continuar</a>
            @else
              @if (Route::has('register'))
                <div class="flex flex-col space-y-2 items-center">
                  <p class="text-gray-300">¿Eres nuevo por aquí?</p>
                  <a href="saludo" class="font-semibold text-white bg-blue-500 hover:bg-blue-600 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Comenzar</a>
                </div>
              @endif
              <div class="flex flex-col space-y-2 items-center">
                <p class="text-gray-300">¿Ya tienes una cuenta?</p>
                <a href="{{ route('login') }}" class="font-semibold text-white bg-blue-500 hover:bg-blue-600 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Iniciar Sesión</a>
              </div>
            @endauth
          </div>
        @endif
      </div>
    </div>
  </div>
</div>


<!---Iconos//////////////////////////////////--->
  <div class="container mx-auto flex flex-wrap items-center justify-center lg:mt-40 md:mt-96 mt-32">
    <ul class="flex justify-center">
      <li class="mr-6">
        <a href="#" class="hover:text-indigo-500 transition-colors duration-300">
          <img src="https://cdn-icons-png.flaticon.com/512/2168/2168281.png" width="50" height="50" alt="Facebook" />
        </a>
      </li>
      <li class="mr-6">
        <a href="#" class="hover:text-indigo-500 transition-colors duration-300">
          <img src="https://cdn-icons-png.flaticon.com/512/3669/3669691.png" width="50" height="50" alt="Twitter" />
        </a>
      </li>
      <li class="mr-6">
        <a href="#" class="hover:text-indigo-500 transition-colors duration-300">
          <img src="https://cdn-icons-png.flaticon.com/512/1384/1384015.png" width="50" height="50" alt="Instagram" />
        </a>
      </li>
    </ul>      
  </div>
</div>