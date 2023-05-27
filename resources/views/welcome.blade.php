<!-- resources/views/welcome.blade.php -->

<link href="/css/app.css" rel="stylesheet">
<body>
<x-guest-layout>

    <!--- Primera sección--->
<div class="bg-gradient-to-b from-blue-100 to-rose-100">
  <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between py-16 lg:py-20 px-4 lg:px-0">
    <div class="lg:w-1/2 lg:order-2">
      <img src="https://media.istockphoto.com/id/1227306238/es/vector/un-personaje-masculino-joven-sentado-en-una-palma-de-mano-psicoterapia-ayuda-y-apoyo-una.jpg?s=612x612&w=0&k=20&c=JMiIP1_fxzsHuMvykO6YNzAVl2SCzS1uSOmOvmkfbEk=" class="h-96 w-96 object-center bg-top mx-auto lg:mx-0 mb-8 lg:mb-0 rounded-full shadow-lg">
    </div>
    <div class="lg:w-1/2 lg:order-2" style="margin-top: 50px;">
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4 text-center" id="word-carousel">¿Te sientes Desanimado?</h2>
        <p class="text-black text-lg mb-8 leading-relaxed text-center">Aenean turpis tortor, sodales vel bibendum et, commodo ac ipsum. Curabitur ut nisi a erat rhoncus mattis at nec turpis. Cras hendrerit consequat lectus vel mollis.</p>
      <div class="flex justify-center lg:justify-start">
        @if (Route::has('login'))
        <div class="space-x-4">
          @auth
          <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-rose-400 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Continuar</a>
          @else
          <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-rose-400 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Iniciar Sesión</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-rose-400 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">Registrarse</a>
          @endif
          @endauth
        </div>
        @endif
      </div>
    </div>
  </div>
</div>



<!--- Segunda sección--->
    <div class="max-w-7xl mx-auto px-6 lg:px-32">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="bg-white p-8 rounded-lg shadow-lg my-8">
                    <h2 class="text-3xl font-bold mb-8 text-teal-700">¿Cómo podemos ayudarte?</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-6">
                        <li class="bg-gray-100 p-6 rounded-lg shadow-lg hover:bg-indigo-100" >
                            <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300">Consejos y técnicas para manejar el estrés y la ansiedad</a>
                            <p class="text-gray-600">En nuestra página encontrarás una variedad de técnicas y estrategias para ayudarte a manejar el estrés y la ansiedad.</p>
                        </li>
                        <li class="bg-gray-100 p-6 rounded-lg shadow-lg hover:bg-indigo-100">
                            <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300">Recursos para mejorar tu bienestar emocional</a>
                            <p class="text-gray-600">Ofrecemos una amplia gama de recursos para mejorar tu bienestar emocional, incluyendo artículos, libros recomendados y enlaces útiles.</p>
                        </li>
                        <li class="bg-gray-100 p-6 rounded-lg shadow-lg hover:bg-indigo-100">
                            <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300">Apoyo y orientación individualizada</a>
                            <p class="text-gray-600">Nuestro equipo de profesionales altamente capacitados está disponible para brindarte apoyo y orientación individualizada en un entorno seguro y confidencial.</p>
                        </li>
                        <li class="bg-gray-100 p-6 rounded-lg shadow-lg hover:bg-indigo-100">
                            <a class="text-xl font-bold mb-4 text-gray-800 hover:text-indigo-700 transition-colors duration-300">Comunidad de apoyo</a>
                            <p class="text-gray-600">Únete a nuestra comunidad en línea para conectarte con otras personas que comparten experiencias similares y brindarse apoyo mutuo en momentos difíciles.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   
</body>

<script type="text/javascript">
    // Obtener el elemento del carrusel
var wordCarousel = document.getElementById('word-carousel');

// Lista de palabras
var wordsList = ['¿No prestas atencion?', '¿Sientes que no estas en tu mejor momento?', 'Llegaste al lugar correcto']; // Agrega más palabras según sea necesario

// Variable para almacenar el índice de la palabra actual
var currentWordIndex = 0;

// Función para cambiar la palabra mostrada
function changeWord() {
    // Obtener el elemento del carrusel y cambiar el texto
    wordCarousel.textContent = wordsList[currentWordIndex];

    // Incrementar el índice de la palabra actual
    currentWordIndex = (currentWordIndex + 1) % wordsList.length;
}

// Iniciar el carrusel
var intervalId = setInterval(changeWord, 4000); // Cambiar cada 2 segundos

// Detener el carrusel al hacer hover
wordCarousel.addEventListener('mouseover', function() {
    clearInterval(intervalId);
});

// Reiniciar el carrusel al quitar el hover
wordCarousel.addEventListener('mouseout', function() {
    intervalId = setInterval(changeWord, 4000);
});

</script>
<!--- Pie de página--->
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

</x-guest-layout>
<script src="https://cdn.tailwindcss.com"></script>


