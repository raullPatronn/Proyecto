<div class="bg-gradient-to-b from-blue-200 to-rose-200">
<!--- Primera Sección --->

<div class="container mx-auto flex flex-wrap items-center justify-center h-screen ">
  <div class="w-full md:w-1/2 md:pr-10">
    <div class="text-center mb-8">
      <h1 class="text-6xl font-bold bg-clip-text text-black font-serif animate__animated animate__fadeInLeft" style="font-family: Georgia, serif;">¿Necesitas Una Mano?</h1>
    </div>
    <p class="text-gray-800 text-lg mb-4 font-sans italic animate__animated animate__fadeInLeft">Ofrecemos ayuda emocional y apoyo para quienes lo necesiten. Puede revisar su menú de servicios.</p>
    <div class="bg-gray-200 shadow-md rounded-md mb-4">
  <div class="flex items-center justify-between bg-purple-500 text-white px-4 py-3 rounded-t-md shadow-md">
    <h2 class="font-bold">Menú de servicios</h2>
    <svg class="h-6 w-6 cursor-pointer text-white hover:text-purple-100 transition-colors duration-300 ease-in-out " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" id="toggleMenu">
      <path d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </div>
  <div id="menu" class="hidden p-4 bg-pink-100 shadow-md">
    <ul class="list-none">
      @foreach($opcionesMenu as $opcion)
      <li class="mb-2">
        <a href="{{ $opcion['ruta'] }}" class="block py-2 px-4 bg-purple-400 hover:bg-purple-700 rounded-md transition-colors duration-300 italic text-white text-lg">{{ $opcion['nombre'] }}</a>
      </li>
      @endforeach
    </ul>
  </div>
</div>
</div>

  <div class="w-full md:w-1/2 flex justify-center md:justify-end">
    <img class="max-w-md md:max-w-lg" src="https://media.istockphoto.com/id/1302861526/es/vector/una-amiga-o-madre-apoya-el-estr%C3%A9s-o-la-depresi%C3%B3n-abrazos-como-una-forma-de-apoyar-y-mostrar.jpg?s=612x612&w=0&k=20&c=abuYzj1vqc4NlnGKRePV9oIK5pH5r8_6nGP4WFuE0R4=" alt="Helping-Hands">
  </div>
 </div>
</div>  

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

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</style>
<script>
$(document).ready(function(){
    $('#toggleMenu').click(function(){
      $('#menu').slideToggle();
    });
  });
</script>
