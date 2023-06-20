<div>
    <div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal del instituto') }}
        </h2>
    </x-slot>
    
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- aqui pones el tipo de las 4 personalidades siguientes -->
        <div class="text-3xl font-bold text-violet-800 text-center">Analistas</div>
            <div class="grid grid-cols-4 gap-4 flex  overflow-hidden shadow-lg sm:rounded-lg ">
                
                <!-- PRIMERA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/uno.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Arquitecto</div>
                                    <p class="text-gray-700 text-base">
                                    Pensadores imaginativos y estratégicos, con un plan para todo.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                <!-- SEGUNDA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/2.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Lógico</div>
                                    <p class="text-gray-700 text-base">
                                    Inventores innovadores con una sed insaciable por el conocimiento.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                <!-- TERCERA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/3.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Comandante</div>
                                    <p class="text-gray-700 text-base">
                                    Líderes audaces imaginativos y de voluntad fuerte, siempre buscando o creando un camino.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                <!-- Cuarta PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/4.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Innovador</div>
                                    <p class="text-gray-700 text-base">
                                    Pensadores inteligentes y curiosos que no pueden resistir un reto intelectual.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                
                
        
            </div>

        </div>

        
    </div>


    <!-- SEGUNDO RANGO DE PERSONALIDADES (OTRAS 4) -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- aqui pones el tipo de las 4 personalidades siguientes -->
        <div class="text-3xl font-bold text-violet-800 text-center">Diplomáticos</div>
            <div class="grid grid-cols-4 gap-4 flex  overflow-hidden shadow-lg sm:rounded-lg ">
                
                <!-- QUINTA PERSONALIDAD -->
                <button wire:click="" class="">
                    <div class="">
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/5.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Abogado</div>
                                    <p class="text-gray-700 text-base">
                                    Callados y místicos que sin embargo son inspiradores e idealistas inalcanzables.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                <!-- SEXTA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/6.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Mediador</div>
                                    <p class="text-gray-700 text-base">
                                    Personas poéticas, amables y altruistas, siempre en busca de ayudar a una buena causa.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                
                <!-- SÉPTIMA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/7.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Protagonista</div>
                                    <p class="text-gray-700 text-base">
                                    Líderes carismáticos e inspiradores, capaces de cautivar a quienes lo escuchan.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                <!-- Octava PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/8.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Activista</div>
                                    <p class="text-gray-700 text-base">
                                    Espíritus libres entusiastas, creativos y sociales, siempre están sonriendo.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                
                
        
            
                
        
            </div>

        </div>

        
    </div>

    <!-- TERCER RANGO DE PERSONALIDAD -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- aqui pones el tipo de las 4 personalidades siguientes -->
        <div class="text-3xl font-bold text-violet-800 text-center">Centinelas</div>
            <div class="grid grid-cols-4 gap-4 flex  overflow-hidden shadow-lg sm:rounded-lg ">
                
                <!-- NOVENA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/9.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Logista</div>
                                    <p class="text-gray-700 text-base">
                                    Individuos prácticos y enfocados en los hechos, de cuya confiabilidad no puede dudarse.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                <!-- DECIMA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/10.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Defensor</div>
                                    <p class="text-gray-700 text-base">
                                    Protectores muy dedicados y cálidos, siempre listos para defender a sus seres queridos.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                
                <!-- DECIMA PRIMERA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/11.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Ejecutivo</div>
                                    <p class="text-gray-700 text-base">
                                    Administradores excelentes,inigualables al administrar cosas o personas.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                <!-- DECIMA SEGUNDA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/12.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Cónsul</div>
                                    <p class="text-gray-700 text-base">
                                    Personas consideradas, sociables y populares, siempre en busca de ayudar.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                
                
        
            
                
        
            </div>

        </div>

        
    </div>

    <!-- CUARTO RANGO DE PERSONALIDADES -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- aqui pones el tipo de las 4 personalidades siguientes -->
        <div class="text-3xl font-bold text-violet-800 text-center">Exploradores</div>
            <div class="grid grid-cols-4 gap-4 flex  overflow-hidden shadow-lg sm:rounded-lg ">
                
                <!-- DECIMA TERCERA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/13.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Virtuoso</div>
                                    <p class="text-gray-700 text-base">
                                    Experimentadores audaces y prácticos, maestro en herramienta.
                                    </p>
                                </div>
                            
                        </div>

                    </div>
                </button>
                <!-- DECIMA CUARTA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/14.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Aventurero</div>
                                    <p class="text-gray-700 text-base">
                                    Artistas flexibles y encantadores, siempre listos para explorar y experimentar algo nuevo.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                
                <!-- DECIMA QUINTA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/15.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Emprendedor</div>
                                    <p class="text-gray-700 text-base">
                                    Personas inteligentes, energéticas y muy perceptivas, que disfrutan vivir al límite.
                                    </p>
                                </div>
                           
                        </div>

                    </div>
                </button>
                <!-- DECIMA SEXTA PERSONALIDAD -->
                <button wire:click="">
                    <div>
                                <!-- comienza la card -->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-violet-400">
                            <img class="w-full" src="{{asset('img/16.png')}}"  alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Animador</div>
                                    <p class="text-gray-700 text-base">
                                    Animadores energéticos y entusiastas. La vida nunca es aburrida a su alrededor.
                                    </p>
                                </div>
                          
                        </div>

                    </div>
                </button>
                
                
        
            
                
        
            </div>

        </div>

        
    </div>


</div>


</div>
