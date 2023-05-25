@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<body class="bg-sky-200">
<div  style="padding: 10px;">
<div id="scrollButtonContainer" class="fixed bottom-24 left-1/2 transform -translate-x-1/2">
  <div id="scrollToBottom" class="animate-bounce bg-white dark:bg-slate-800 p-2 w-10 h-10 ring-1 ring-slate-900/5 dark:ring-slate-200/20 shadow-lg rounded-full flex items-center justify-center">
    <svg class="w-6 h-6 text-violet-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
      <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
    </svg>
  </div>
</div>

  <div class="flex flex-col items-center justify-center py-8">
  <div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center mb-16 lg:mt-72">
      <div class="md:w-1/2" data-aos="fade-down-right">
        <img src="https://static.vecteezy.com/system/resources/previews/002/910/231/non_2x/closeup-helping-hands-on-the-sky-background-rescue-and-help-friendship-cencept-free-photo.jpg" class="w-full rounded-lg shadow-lg mb-16">
      </div>
      <div class="md:w-1/2 ml-8" data-aos="fade-up">
        <h2 class="text-5xl font-bold mb-4">No estás solo</h2>
        <p class="text-2xl">"Encuentra un refugio emocional en nuestra página web. Aquí estamos para escucharte y ofrecerte el apoyo que necesitas en momentos difíciles. Juntos podemos superar cualquier desafío emocional."</p>
      </div>
    </div>
    
    <div class="flex flex-col md:flex-row-reverse md:items-center mb-16 mt-48 py-8">
      <div class="md:w-1/2" data-aos="fade-down-left">
        <img src="https://static.vecteezy.com/system/resources/previews/001/223/769/non_2x/human-hands-in-a-team-huddle-free-photo.jpg" alt="Imagen 2" class="w-full rounded-lg shadow-lg mb-8 ml-8">
      </div>
      <div class="md:w-1/2" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-4">Una comunidad de apoyo en línea</h2>
        <p class="text-xl">"Únete a nuestra comunidad de personas que entienden lo que estás pasando. Comparte tus experiencias, recibe consejos y brinda apoyo a otros que también necesitan un hombro virtual en el que apoyarse. Juntos somos más fuertes."</p>
      </div>
    </div>
    
    <div class="flex flex-col md:flex-row md:items-center mb-16 mt-52 py-8">
      <div class="md:w-1/2" data-aos="fade-down-right">
        <img src="https://static.vecteezy.com/system/resources/previews/003/089/591/non_2x/silhouette-of-healthy-woman-is-practicing-yoga-lake-during-sunset-free-photo.jpg" alt="Imagen 3" class="w-full rounded-lg shadow-lg mb-8">
      </div>
      <div class="md:w-1/2 ml-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-4">Recursos para el bienestar emocional</h2>
        <p class="text-xl">"Explora nuestra selección de recursos diseñados para mejorar tu bienestar emocional. Desde técnicas de relajación y mindfulness hasta consejos para manejar el estrés, encontrarás herramientas prácticas que te ayudarán a cuidar de ti mismo."</p>
      </div>
    </div>
    
    <div class="flex flex-col md:flex-row-reverse md:items-center mb-16 mt-52 py-8">
      <div class="md:w-1/2" data-aos="fade-down-left">
        <img src="https://ayudaleyprotecciondatos.es/wp-content/uploads/2020/07/libertad-de-expresion-en-internet-02.jpg" alt="Imagen 4" class="w-full rounded-lg shadow-lg mb-8 ml-8">
      </div>
      <div class="md:w-1/2" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-4">Un espacio seguro para expresarte</h2>
        <p class="text-xl">"Nuestra página web de ayuda emocional es un espacio seguro y libre de juicio donde puedes expresar tus pensamientos y sentimientos sin temor. Aquí, te ofrecemos un lugar acogedor para que te escuches a ti mismo y te conectes con otros que comparten tus experiencias. Juntos, encontraremos consuelo y comprensión mutua."</p>
      </div>
    </div>
    
    <div class="flex flex-col md:flex-row md:items-center mb-16 mt-48 py-8">
      <div class="md:w-1/2" data-aos="fade-down-right">
        <img src="https://ayudaleyprotecciondatos.es/wp-content/uploads/2020/07/libertad-de-expresion-en-internet-02.jpg" alt="Imagen 5" class="w-full rounded-lg shadow-lg mb-32">
      </div>
      <div class="md:w-1/2 ml-8" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-4">Encuentra esperanza en tiempos difíciles</h2>
        <p class="text-xl">"Sabemos que los momentos difíciles pueden hacerte sentir sin esperanza, pero en nuestra página de ayuda emocional, te recordamos que siempre hay luz al final del camino. Encuentra inspiración, motivación y consejos prácticos para superar las adversidades y construir una vida emocionalmente satisfactoria."</p>
      </div>
    </div>
  </div>
</div>
      <div class="flex justify-center">
      @if (Route::has('login'))
      <div class="space-x-4">
        @auth
        @else
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="font-semibold text-white hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-purple-500 py-3 px-6 rounded-full shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 ">Continuar</a>
        @endif
        @endauth
      </div>
      @endif
    </div>
    <br>
</div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// Obtener el elemento contenedor y el elemento SVG
const scrollButtonContainer = document.getElementById('scrollButtonContainer');
const scrollToBottom = document.getElementById('scrollToBottom');

// Manejar el evento scroll
window.addEventListener('scroll', function() {
  scrollButtonContainer.style.opacity = '1'; // Mostrar el elemento
});

// Manejar el evento click en el SVG
scrollToBottom.addEventListener('click', function() {
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: 'smooth'
  });
  
  setTimeout(function() {
    scrollButtonContainer.style.opacity = '0'; // Ocultar el elemento después del desplazamiento
  }, 1000);
});
</script>
<script>
  AOS.init();
</script>