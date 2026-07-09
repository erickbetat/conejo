<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conejo Cantú 88 | Sitio Oficial</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&family=Teko:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Efecto Racing (Drive-in / Drive-out) */
        .racing-text {
            display: inline-block;
            animation: drive-by 6s cubic-bezier(0.25, 1, 0.5, 1) infinite;
        }
        
        @keyframes drive-by {
            /* 0% - Entra a toda velocidad desde la izquierda */
            0% { 
                transform: translateX(-150%) skewX(-30deg); 
                opacity: 0; 
            }
            /* 8% - Frena pasándose un poquito de la marca */
            8% { 
                transform: translateX(5%) skewX(10deg); 
                opacity: 1; 
            }
            /* 12% - Se asienta y se "estaciona" perfectamente */
            12% { 
                transform: translateX(0) skewX(0); 
            }
            /* 12% al 75% - Se queda estacionado para que se pueda leer */
            75% { 
                transform: translateX(0) skewX(0); 
                opacity: 1;
            }
            /* 80% - Coge impulso hacia atrás como si quemara llanta */
            80% { 
                transform: translateX(-5%) skewX(-10deg); 
                opacity: 1;
            }
            /* 90% - Sale a toda velocidad hacia la derecha */
            90% { 
                transform: translateX(150%) skewX(30deg); 
                opacity: 0; 
            }
            /* 100% - Se mantiene oculto para reiniciar el ciclo */
            100% { 
                transform: translateX(150%) skewX(30deg); 
                opacity: 0; 
            }
        }
        
        /* Cursor Máquina de escribir */
        .typewriter-cursor {
            display: inline-block;
            width: 3px;
            height: 1.2em;
            background-color: var(--color-red);
            vertical-align: text-bottom;
            animation: blink 1s step-end infinite;
            margin-left: 2px;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-brand-black text-white antialiased selection:bg-brand-red selection:text-white">
    
    <!-- Barra de Progreso de Lectura -->
    <div id="reading-progress" class="fixed top-0 left-0 h-1 bg-brand-red z-[60] transition-all duration-100 w-0"></div>

    <!-- Menú de Navegación Flotante -->
    <nav class="fixed top-0 w-full z-50 bg-brand-black/80 backdrop-blur-md border-b border-white/5 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-racing text-brand-red tracking-wide italic uppercase">CANTÚ<span class="text-white">88</span></a>
            
            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="#biografia" class="text-gray-300 hover:text-brand-red transition-colors uppercase font-racing text-xl tracking-widest">Biografía</a>
                <a href="#estadisticas" class="text-gray-300 hover:text-brand-red transition-colors uppercase font-racing text-xl tracking-widest">Estadísticas</a>
                <a href="#suscripciones" class="bg-brand-red hover:bg-brand-red-hover text-white px-8 py-2 font-racing uppercase tracking-wider text-xl transition-all duration-300 shadow-[0_0_15px_rgba(230,32,32,0.3)] hover:scale-105" style="clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);">Unirme al Club</a>
            </div>
            
            <!-- Menú Móvil Simple -->
            <div class="md:hidden">
                <a href="#suscripciones" class="bg-brand-red text-white px-4 py-2 rounded-full text-xs uppercase font-bold tracking-wider">Unirme</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative flex-grow flex flex-col justify-center min-h-[90vh] pt-24 px-6 overflow-hidden bg-brand-black">
        <!-- Background Elements: Softer gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-red/10 via-brand-black to-brand-black z-0"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20 z-0"></div>
        
        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-8 items-center relative z-10 flex-grow">
            <!-- Text Left -->
            <div class="p-8 md:p-12 animate-fade-in-up text-left">
                <div class="inline-block px-4 py-1 border border-brand-red/50 text-brand-red font-racing text-xl mb-6 rounded-tl-lg rounded-br-lg" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%);">
                    PILOTO OFICIAL
                </div>
                <h1 class="text-7xl md:text-9xl font-racing mb-2 tracking-wide uppercase italic leading-none drop-shadow-lg">
                    CONEJO <br/><span class="text-brand-red racing-text inline-block mt-2">CANTÚ</span>
                </h1>
                <p class="text-brand-gray text-xl md:text-2xl mb-10 font-light uppercase tracking-widest h-16 md:h-10">
                    <span id="typewriter-text"></span><span class="typewriter-cursor"></span>
                </p>
                <div class="flex flex-col sm:flex-row gap-6 opacity-0 translate-y-4 pt-4" id="hero-buttons" style="transition: opacity 1s ease, transform 1s ease;">
                    <a href="#suscripciones" class="group relative inline-flex items-center justify-center px-12 py-3 font-racing text-2xl uppercase tracking-wider text-white transition-all duration-300 hover:-translate-y-1 w-full sm:w-auto">
                        <div class="absolute inset-0 bg-brand-red skew-x-[-12deg] rounded-sm transition-all duration-300 group-hover:bg-red-700 shadow-[0_0_20px_rgba(230,32,32,0.3)] group-hover:shadow-[0_0_30px_rgba(230,32,32,0.5)]"></div>
                        <span class="relative mt-1">Apoyar al Piloto</span>
                    </a>
                    <a href="#biografia" class="group relative inline-flex items-center justify-center px-12 py-3 font-racing text-2xl uppercase tracking-wider text-white transition-all duration-300 hover:-translate-y-1 w-full sm:w-auto mt-2 sm:mt-0">
                        <div class="absolute inset-0 bg-white/5 border border-white/20 skew-x-[-12deg] rounded-sm transition-all duration-300 group-hover:bg-white/10"></div>
                        <span class="relative mt-1">Conocer Más</span>
                    </a>
                </div>
            </div>
            
            <!-- Image Placeholder Right -->
            <div class="hidden lg:flex justify-center items-end h-[80vh] relative animate-fade-in-up" style="animation-delay: 0.3s;">
                <!-- Efecto de resplandor detrás del piloto -->
                <div class="absolute inset-0 bg-brand-red/5 blur-[100px] rounded-full z-0"></div>
                <div class="w-full h-full bg-gradient-to-t from-brand-black via-transparent to-transparent absolute bottom-0 left-0 z-20"></div>
                
                <div class="text-white/5 font-racing text-[15rem] absolute -right-10 top-10 select-none z-0 leading-none">88</div>
                
                <!-- Caja de imagen con diseño fusión (bordes redondeados + corte) -->
                <div class="w-3/4 h-5/6 border border-white/10 bg-brand-dark/30 backdrop-blur-sm rounded-2xl flex items-center justify-center relative z-10 overflow-hidden" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 40px), calc(100% - 40px) 100%, 0 100%); box-shadow: inset 0 0 20px rgba(255,255,255,0.02);">
                    <span class="text-white/40 font-racing text-3xl uppercase tracking-widest text-center px-4">Foto del Piloto<br/><span class="text-sm">(Fondo Transparente)</span></span>
                </div>
            </div>
        </div>

        @if(isset($partners) && $partners->count() > 0)
        <!-- Partners en el Hero (Estilo F1 Moderno) -->
        <div class="w-full border-t border-white/10 bg-brand-black/50 backdrop-blur-md relative z-20 mt-10">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-wrap justify-center items-center gap-10 md:gap-16 opacity-60 hover:opacity-100 transition-opacity duration-500">
                @foreach($partners as $partner)
                    <div class="w-20 md:w-28 transition-transform duration-300 hover:scale-105 filter grayscale hover:grayscale-0">
                        @if($partner->url)
                            <a href="{{ $partner->url }}" target="_blank" rel="noopener noreferrer" class="block" title="{{ $partner->name }}">
                                <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="w-full h-auto object-contain max-h-12">
                            </a>
                        @else
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" class="w-full h-auto object-contain max-h-12" title="{{ $partner->name }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </main>

    <!-- Estadísticas (Grid de Tarjetas) y Trayectoria -->
    <section id="estadisticas" class="py-16 px-6 bg-brand-black relative z-20 border-b border-white/5">
        <div class="max-w-7xl mx-auto">
            
            <!-- Tarjetas Superiores -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12" id="stats-container">
                <!-- Tarjeta Principal (Número) -->
                <div class="bg-brand-red text-white p-6 rounded-xl flex items-center justify-center shadow-lg" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%);">
                    <div class="text-8xl font-racing italic leading-none mr-4">88</div>
                    <div class="flex flex-col">
                        <span class="text-xl font-racing uppercase tracking-widest leading-tight">Conejo</span>
                        <span class="text-3xl font-racing uppercase tracking-widest leading-tight">Cantú</span>
                    </div>
                </div>
                
                <!-- Tarjetas de Stats -->
                <div class="bg-brand-dark border border-white/5 p-6 rounded-xl flex flex-col justify-center items-center hover:bg-white/5 transition-colors" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 0 100%);">
                    <div class="text-5xl font-racing mb-1 italic text-white"><span class="counter" data-target="121">0</span></div>
                    <div class="text-sm font-racing uppercase tracking-widest text-brand-red">Carreras</div>
                </div>
                <div class="bg-brand-dark border border-white/5 p-6 rounded-xl flex flex-col justify-center items-center hover:bg-white/5 transition-colors" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 0 100%);">
                    <div class="text-5xl font-racing mb-1 italic text-white"><span class="counter" data-target="78">0</span></div>
                    <div class="text-sm font-racing uppercase tracking-widest text-brand-red">Podios</div>
                </div>
                <div class="bg-brand-dark border border-white/5 p-6 rounded-xl flex flex-col justify-center items-center hover:bg-white/5 transition-colors" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 0 100%);">
                    <div class="text-5xl font-racing mb-1 italic text-white"><span class="counter" data-target="10">0</span></div>
                    <div class="text-sm font-racing uppercase tracking-widest text-brand-red">Años Exp.</div>
                </div>
            </div>

            <!-- Detalle de Trayectoria (Grid List) -->
            <div class="bg-brand-dark border border-white/5 rounded-2xl p-8 md:p-12 relative overflow-hidden shadow-2xl" style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 30px), calc(100% - 30px) 100%, 0 100%);">
                <!-- Efecto de fondo sutil -->
                <div class="absolute right-0 top-0 w-1/2 h-full bg-gradient-to-l from-brand-red/5 to-transparent z-0"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-8 border-b border-white/10 pb-6">
                        <div class="w-2 h-8 bg-brand-red rounded-sm"></div>
                        <h3 class="text-4xl font-racing uppercase tracking-widest text-white italic">Trayectoria <span class="text-brand-red">Oficial</span></h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <!-- Columna Izquierda -->
                        <div class="space-y-6">
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform">#1</div>
                                <div class="text-gray-300 font-light text-lg pt-1">Fórmula 4 México</div>
                            </div>
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform">#2</div>
                                <div class="text-gray-300 font-light text-lg pt-1">Fórmula 4 Latinoamérica</div>
                            </div>
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform">#6</div>
                                <div class="text-gray-300 font-light text-lg pt-1">MUNDIAL Fórmula 4 <span class="text-gray-500 text-sm ml-1">(Rusia)</span></div>
                            </div>
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform">#5</div>
                                <div class="text-gray-300 font-light text-lg pt-1">Mundial e-Karting <span class="text-gray-500 text-sm ml-1">(Portugal)</span></div>
                            </div>
                        </div>

                        <!-- Columna Derecha -->
                        <div class="space-y-6">
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform italic">3x</div>
                                <div class="text-gray-300 font-light text-lg pt-1">Campeón Nacional Karting</div>
                            </div>
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform italic">3x</div>
                                <div class="text-gray-300 font-light text-lg pt-1">Subcampeón Nacional Karting</div>
                            </div>
                            <div class="flex items-start gap-5 group">
                                <div class="text-brand-red font-racing text-4xl leading-none w-12 group-hover:scale-110 transition-transform">🏁</div>
                                <div class="text-gray-300 font-light text-lg pt-1">
                                    3 mundiales y 2 centro-sudamericanos (#2 y #4)
                                </div>
                            </div>
                        </div>

                        <!-- Premios Especiales (Fila completa) -->
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 pt-8 border-t border-white/5">
                            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-colors">
                                <div class="flex items-center gap-4 mb-2">
                                    <span class="text-3xl">🏆</span>
                                    <h4 class="text-xl font-racing uppercase tracking-widest text-white">Casco de Plata 2023</h4>
                                </div>
                                <p class="text-sm text-gray-400 font-light pl-[3.25rem]">Premio al mejor piloto Mexicano de Karting.</p>
                            </div>
                            
                            <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition-colors relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-16 h-16 bg-brand-red/10 rounded-full blur-xl"></div>
                                <div class="flex items-center gap-4 mb-2">
                                    <span class="text-3xl">🌎</span>
                                    <h4 class="text-xl font-racing uppercase tracking-widest text-white">FIA América Awards 2023</h4>
                                </div>
                                <p class="text-sm text-gray-400 font-light pl-[3.25rem]">Único Mexicano ganador (se entrega 1 al año). Entregado en Panamá.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Carrera Destacada (Estilo Widget Retrospectivo) -->
    <section id="carrera-destacada" class="py-20 px-6 bg-brand-black relative">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-2 h-8 bg-brand-red rounded-sm"></div>
                <h2 class="text-4xl md:text-5xl font-racing tracking-widest text-white uppercase italic">Carrera <span class="text-brand-red">Destacada</span></h2>
            </div>
            
            <div class="bg-brand-dark border border-brand-red/20 rounded-2xl overflow-hidden shadow-[0_0_40px_rgba(230,32,32,0.1)] relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-red via-brand-red/50 to-transparent"></div>
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="p-10 md:col-span-2 flex flex-col justify-center">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <div class="inline-block px-3 py-1 bg-brand-red text-white text-xs font-bold uppercase tracking-widest rounded-md w-max shadow-lg shadow-brand-red/30">1er Lugar</div>
                            <div class="inline-block px-3 py-1 bg-white/10 text-brand-gray text-xs font-bold uppercase tracking-widest rounded-md w-max border border-white/5">Fórmula 4 México</div>
                        </div>
                        <h3 class="text-5xl md:text-6xl font-racing text-white uppercase italic mb-2 leading-none">Gran Premio Ciudad de México</h3>
                        <p class="text-brand-gray text-xl uppercase tracking-widest mb-6">Autódromo Hermanos Rodríguez</p>
                        
                        <p class="text-gray-400 font-light max-w-xl mb-8">Una actuación histórica que consolidó a Conejo Cantú en lo más alto del podio en el circuito más emblemático del país, frente a miles de aficionados al automovilismo.</p>
                        
                        <div class="flex flex-wrap gap-4">
                            <div class="bg-white/5 border border-white/10 text-white font-racing text-2xl px-6 py-2 rounded-lg flex items-center gap-2"><span class="text-brand-red">Pos:</span> P1</div>
                            <div class="bg-white/5 border border-white/10 text-white font-racing text-2xl px-6 py-2 rounded-lg flex items-center gap-2"><span class="text-brand-red">V. Rápida:</span> Récord Pista</div>
                        </div>
                    </div>
                    
                    <div class="bg-white/5 border-l border-white/5 p-10 flex flex-col items-center justify-center relative overflow-hidden min-h-[250px] bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
                        <!-- Red glow effect -->
                        <div class="absolute inset-0 bg-brand-red/10 mix-blend-overlay"></div>
                        <div class="absolute w-32 h-32 bg-brand-red rounded-full blur-[60px] opacity-20"></div>
                        
                        <!-- Trophy Graphic -->
                        <div class="text-[8rem] leading-none transform rotate-12 filter drop-shadow-2xl z-10 select-none">🏆</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Biografía & Secciones Dinámicas (Grid Híbrido) -->
    <section id="biografia" class="py-20 px-6 relative bg-brand-black">
        <div class="max-w-7xl mx-auto space-y-12">
            
            @if($biography)
            <!-- Tarjeta de Biografía -->
            <div class="bg-brand-dark border border-white/5 rounded-2xl overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <div class="w-full lg:w-5/12 relative min-h-[400px]">
                        @if($biography->image_path)
                            <div class="absolute inset-0 bg-brand-red/20 mix-blend-overlay z-10 transition-all duration-500 hover:bg-transparent"></div>
                            <img src="{{ asset('storage/' . $biography->image_path) }}" alt="{{ $biography->title }}" class="absolute inset-0 w-full h-full object-cover object-center grayscale hover:grayscale-0 transition-all duration-700">
                        @else
                            <div class="absolute inset-0 bg-black flex items-center justify-center">
                                <span class="text-brand-gray font-light">Sin Imagen</span>
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-brand-black" style="clip-path: polygon(100% 0, 0 100%, 100% 100%);"></div>
                    </div>
                    
                    <div class="w-full lg:w-7/12 p-10 md:p-14 flex flex-col justify-center">
                        <div class="flex items-center gap-4 mb-4">
                            <h2 class="text-brand-red font-racing text-2xl uppercase tracking-widest">{{ $biography->title }}</h2>
                            <div class="flex-grow h-[1px] bg-white/10"></div>
                        </div>
                        <h3 class="text-5xl md:text-6xl font-racing mb-8 leading-none uppercase italic text-white">La velocidad en la sangre</h3>
                        <div class="prose prose-invert prose-lg prose-p:text-gray-400 prose-p:leading-relaxed max-w-none font-light">
                            {!! nl2br(e($biography->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Grid de Secciones Dinámicas -->
            @if($sections->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-10">
                @foreach($sections as $index => $section)
                    <div class="bg-brand-dark border border-white/5 rounded-2xl overflow-hidden flex flex-col hover:border-white/10 transition-colors group">
                        @if($section->image_path)
                            <div class="w-full h-64 relative overflow-hidden">
                                <img src="{{ asset('storage/' . $section->image_path) }}" alt="{{ $section->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                        @endif
                        <div class="p-8 flex-grow flex flex-col">
                            <h2 class="text-3xl font-racing uppercase tracking-widest text-white mb-4 italic">{{ $section->title }}</h2>
                            <div class="prose prose-invert prose-p:text-gray-400 prose-sm flex-grow">
                                {!! nl2br(e($section->body)) !!}
                            </div>
                        </div>
                        <div class="h-1 w-0 bg-brand-red group-hover:w-full transition-all duration-500"></div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- Opciones de Suscripción (Tarjetas Fusión) -->
    <section id="suscripciones" class="py-24 px-6 bg-brand-black relative">
        <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_bottom_center,_var(--tw-gradient-stops))] from-brand-red/20 via-transparent to-transparent"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <div class="inline-block px-4 py-1 border border-white/10 text-brand-gray text-sm font-bold uppercase tracking-widest rounded-full mb-4">Membresías</div>
                <h2 class="text-5xl md:text-7xl font-racing tracking-wide text-white mb-4 uppercase italic">Conejo <span class="text-brand-red">Club</span></h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto font-light">Sé parte de esta historia. ¡Vamos juntos a la Fórmula 1!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Club Oro -->
                <div class="bg-brand-dark border border-white/10 flex flex-col shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(255,255,255,0.05)] rounded-2xl overflow-hidden relative group">
                    <div class="p-8 pb-0">
                        <h4 class="text-2xl font-racing uppercase text-gray-400 mb-1">Club Oro</h4>
                        <div class="font-racing text-5xl text-white mb-2">MXN 180<span class="text-xl text-gray-600 font-sans normal-case ml-2">/ mes</span></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <p class="text-sm text-gray-400 mb-6 flex-grow font-light">Únete al equipo. Tendrás acceso a noticias, beneficios y contenido exclusivo.</p>
                        
                        <ul class="space-y-4 mb-8 text-sm text-gray-300">
                            <li class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full bg-brand-red"></div>
                                Contenido exclusivo
                            </li>
                        </ul>
                        
                        <a href="#" class="block text-center w-full bg-white/5 border border-white/10 text-white font-racing text-xl uppercase py-3 transition-colors hover:bg-white hover:text-black rounded-xl">Unirse a Oro</a>
                    </div>
                </div>

                <!-- Club Titanio (Popular) -->
                <div class="bg-brand-dark border border-brand-red flex flex-col shadow-[0_0_30px_rgba(230,32,32,0.15)] transition-all duration-300 hover:-translate-y-4 hover:shadow-[0_10px_50px_rgba(230,32,32,0.25)] rounded-2xl overflow-hidden relative md:-mt-4 md:mb-4 group">
                    <div class="absolute top-0 right-0 bg-brand-red text-white text-xs font-bold px-4 py-1 rounded-bl-lg uppercase tracking-widest z-10">Más Popular</div>
                    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-br from-brand-red/20 to-transparent"></div>
                    
                    <div class="p-8 pb-0 relative z-10">
                        <h4 class="text-2xl font-racing uppercase text-brand-red mb-1">Club Titanio</h4>
                        <div class="font-racing text-5xl text-white mb-2">MXN 760<span class="text-xl text-gray-500 font-sans normal-case ml-2">/ mes</span></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow relative z-10">
                        <p class="text-sm text-gray-300 mb-6 flex-grow font-light">Para los verdaderos fans que quieren llevar el apoyo al siguiente nivel.</p>
                        
                        <ul class="space-y-4 mb-8 text-sm text-gray-300">
                            <li class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full bg-brand-red"></div>
                                Todo lo de Club Oro
                            </li>
                            <li class="flex items-center gap-3 font-medium text-white">
                                <div class="w-1.5 h-1.5 rounded-full bg-brand-red"></div>
                                Descuentos en merch oficial
                            </li>
                        </ul>
                        
                        <a href="#" class="block text-center w-full bg-brand-red text-white font-racing text-xl uppercase py-3 transition-colors hover:bg-red-700 rounded-xl shadow-[0_0_15px_rgba(230,32,32,0.4)]">Unirse a Titanio</a>
                    </div>
                </div>

                <!-- Club Elite -->
                <div class="bg-brand-dark border border-white/10 flex flex-col shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(255,215,0,0.1)] rounded-2xl overflow-hidden relative group">
                    <div class="p-8 pb-0">
                        <h4 class="text-2xl font-racing uppercase text-yellow-500 mb-1">Club Elite</h4>
                        <div class="font-racing text-5xl text-white mb-2">MXN 1,880<span class="text-xl text-gray-600 font-sans normal-case ml-2">/ mes</span></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <p class="text-sm text-gray-400 mb-6 flex-grow font-light">La experiencia definitiva de F1. Conviértete en parte integral de la carrera.</p>
                        
                        <ul class="space-y-4 mb-8 text-sm text-gray-300">
                            <li class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full bg-brand-red"></div>
                                Todo lo de Club Titanio
                            </li>
                            <li class="flex items-center gap-3 font-medium text-yellow-500">
                                <div class="w-1.5 h-1.5 rounded-full bg-yellow-500"></div>
                                Convivencia VIP con el piloto
                            </li>
                        </ul>
                        
                        <a href="#" class="block text-center w-full bg-white/5 border border-yellow-500/30 text-yellow-500 font-racing text-xl uppercase py-3 transition-all hover:bg-yellow-500 hover:text-black rounded-xl">Unirse a Elite</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brand-black border-t border-white/5 py-12 text-center text-brand-gray">
        <p class="font-light">&copy; {{ date('Y') }} Conejo Cantú 88. Todos los derechos reservados.</p>
    </footer>

    <!-- Botón Flotante WhatsApp -->
    <a href="https://wa.me/5211234567890?text=Hola%20Cristian,%20me%20interesa%20ser%20patrocinador/miembro%20de%20Conejo%20Club!" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-[0_0_20px_rgba(34,197,94,0.4)] hover:shadow-[0_0_30px_rgba(34,197,94,0.6)] hover:-translate-y-1 transition-all duration-300 z-50 flex items-center justify-center group">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.885m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
        </svg>
        <span class="absolute right-14 bg-black text-white text-xs px-3 py-1 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Hablar con el Equipo</span>
    </a>

    <!-- Script de Animaciones y UX -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // --- Animación Typewriter ---
            const textToType = "Piloto profesional de karting. Acompáñame hacia lo más alto del podio.";
            const textElement = document.getElementById('typewriter-text');
            const buttonsElement = document.getElementById('hero-buttons');
            let typeIndex = 0;

            function typeWriter() {
                if (typeIndex < textToType.length) {
                    textElement.innerHTML += textToType.charAt(typeIndex);
                    typeIndex++;
                    setTimeout(typeWriter, 50); // Velocidad de tecleo
                } else {
                    // Cuando termina de escribir, mostrar los botones con un slide-in suave
                    buttonsElement.style.opacity = '1';
                    buttonsElement.style.transform = 'translateY(0)';
                }
            }
            
            // Iniciar la máquina de escribir después de medio segundo de cargar la página
            setTimeout(typeWriter, 500);

            // --- Barra de Progreso de Lectura ---
            const progressBar = document.getElementById('reading-progress');
            window.addEventListener('scroll', () => {
                const totalScroll = document.documentElement.scrollTop;
                const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrollValue = `${totalScroll / windowHeight * 100}%`;
                progressBar.style.width = scrollValue;
                
                // Efecto de sombra sutil en la Navbar al hacer scroll
                const navbar = document.getElementById('navbar');
                if(totalScroll > 50) {
                    navbar.classList.add('shadow-lg', 'shadow-brand-red/10');
                } else {
                    navbar.classList.remove('shadow-lg', 'shadow-brand-red/10');
                }
            });

            // --- Animación de Estadísticas (Counter) ---
            const counters = document.querySelectorAll('.counter');
            const speed = 200; // Mientras más bajo, más rápido

            const animateCounters = () => {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        
                        // Calcular el incremento
                        const inc = target / speed;

                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            // Intersection Observer para disparar la animación cuando el usuario hace scroll
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5 // Se dispara cuando el 50% de la sección es visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target); // Solo animar una vez
                    }
                });
            }, observerOptions);

            const statsContainer = document.getElementById('stats-container');
            if (statsContainer) {
                observer.observe(statsContainer);
            }
        });
    </script>
</body>
</html>
