<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
   <div class="bg-gradient-to-b from-blue-200 to-rose-200">
    <div class="flex flex-col items-center justify-center h-screen">
    <img src="https://media.istockphoto.com/id/1227306238/es/vector/un-personaje-masculino-joven-sentado-en-una-palma-de-mano-psicoterapia-ayuda-y-apoyo-una.jpg?s=612x612&w=0&k=20&c=JMiIP1_fxzsHuMvykO6YNzAVl2SCzS1uSOmOvmkfbEk=" class="h-64 w-64 object-center bg-top rounded-full shadow-lg animate__animated animate__fadeInLeft">
   <div class="container mx-auto flex flex-col items-center justify-center py-16 px-4 lg:px-0 animate__animated animate__fadeInUp">
    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4 text-center" style="font-family: 'Playfair Display', serif;" id="word-carousel">¿Te sientes Desanimado?</h2>
    <p class="text-black text-base md:text-lg leading-relaxed text-center italic mb-8" style="font-family: 'Quicksand', sans-serif;">¡Hola! Bienvenido/a a Helping Hands, espero que encuentres la información y recursos que necesitas para mejorar tu bienestar emocional. Recuerda que siempre hay luz al final del túnel y que hay personas dispuestas a ayudarte en tu camino hacia una vida más saludable y feliz. ¡Ánimo y adelante!</p>
    <div class="flex justify-center">
      @if (Route::has('login'))
      <div class="space-x-4">
        @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-purple-500 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Continuar</a>
        @else
        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-purple-500 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Iniciar Sesión</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-purple-500 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Registrarse</a>
        @endif
        @endauth
      </div>
      @endif
    </div>
  </div>
  
  </div>
  
  <!--- Segunda sección--->
  <div class="max-w-7xl mx-auto px-6 lg:px-32">  
      <div class="p-6 bg-transparent border-b border-gray-200">
        <div class="bg-transparent p-8 rounded-lg shadow-lg my-8">
          <h2 class="text-3xl font-bold mb-8 text-black" style="font-family: 'Playfair Display', serif;">¿Cómo podemos ayudarte?</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg">
            <div class="bg-transparent p-6 rounded-lg shadow-lg hover:bg-indigo-100">
              <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300 block">Consejos y técnicas para manejar el estrés y la ansiedad</a>
              <p class="text-gray-800">En nuestra página encontrarás una variedad de técnicas y estrategias para ayudarte a manejar el estrés y la ansiedad.</p>
            </div>
            <div class="bg-transparent p-6 rounded-lg shadow-lg hover:bg-indigo-100">
              <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300 block">Recursos para mejorar tu bienestar emocional</a>
              <p class="text-gray-800">Ofrecemos una amplia gama de recursos para mejorar tu bienestar emocional, incluyendo artículos, libros recomendados y enlaces útiles.</p>
            </div>
            <div class="bg-transparent p-6 rounded-lg shadow-lg hover:bg-indigo-100">
              <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300 block">Apoyo y orientación individualizada</a>
              <p class="text-gray-800">Nuestro equipo de profesionales altamente capacitados está disponible para brindarte apoyo y orientación individualizada en un entorno seguro y confidencial.</p>
            </div>
            <div class="bg-transparent p-6 rounded-lg shadow-lg hover:bg-indigo-100">
              <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300 block">Comunidad de apoyo</a>
              <p class="text-gray-800">Únete a nuestra comunidad en línea para conectarte con otras personas que comparten experiencias similares y brindarse apoyo mutuo en momentos difíciles.</p>
            </div>
          </div>
        </div>
      </div>  
   </div>
  </div>
  <!--- Tercera sección--->
  
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
