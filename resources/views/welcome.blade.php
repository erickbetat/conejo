<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conejo Cantú 88 | Sitio Oficial</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
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
            <a href="/" class="text-2xl font-black text-brand-red tracking-tighter italic">CANTÚ<span class="text-white">88</span></a>
            
            <div class="hidden md:flex items-center gap-8 font-medium">
                <a href="#biografia" class="text-gray-300 hover:text-white transition-colors uppercase tracking-widest text-sm">Biografía</a>
                <a href="#estadisticas" class="text-gray-300 hover:text-white transition-colors uppercase tracking-widest text-sm">Estadísticas</a>
                <a href="#suscripciones" class="bg-brand-red hover:bg-brand-red-hover text-white px-6 py-2 rounded-full uppercase tracking-wider text-sm transition-all duration-300 shadow-[0_0_15px_rgba(230,32,32,0.3)] hover:scale-105">Unirme al Club</a>
            </div>
            
            <!-- Menú Móvil Simple -->
            <div class="md:hidden">
                <a href="#suscripciones" class="bg-brand-red text-white px-4 py-2 rounded-full text-xs uppercase font-bold tracking-wider">Unirme</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative flex-grow flex items-center justify-center min-h-[90vh] pt-20 px-6 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-brand-red/20 via-brand-black to-brand-black -z-10"></div>
        
        <div class="glass-panel p-8 md:p-14 max-w-4xl text-center relative z-10 animate-fade-in-up overflow-hidden">
            <h1 class="text-6xl md:text-8xl font-black mb-4 tracking-tighter drop-shadow-2xl">
                CONEJO <span class="text-brand-red racing-text">CANTÚ</span>
            </h1>
            <p class="text-brand-gray text-xl md:text-2xl mb-10 max-w-2xl mx-auto font-light h-16 md:h-10">
                <span id="typewriter-text"></span><span class="typewriter-cursor"></span>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center opacity-0 translate-y-4" id="hero-buttons" style="transition: opacity 1s ease, transform 1s ease;">
                <a href="#biografia" class="bg-white text-brand-black hover:bg-gray-200 font-bold py-4 px-10 rounded-full uppercase tracking-wider transition-all duration-300 hover:scale-105">
                    Conoce mi historia
                </a>
                <a href="#" class="bg-brand-red hover:bg-brand-red-hover text-white font-bold py-4 px-10 rounded-full uppercase tracking-wider transition-all duration-300 shadow-[0_0_20px_rgba(230,32,32,0.4)] hover:shadow-[0_0_30px_rgba(230,32,32,0.6)] hover:scale-105">
                    Apoyar al Piloto
                </a>
            </div>
        </div>
    </main>

    <!-- Biografía Section -->
    <section id="biografia" class="pt-32 pb-24 px-6 relative bg-brand-dark">
        <div class="max-w-7xl mx-auto">
            @if($biography)
                <div class="flex flex-col lg:flex-row gap-16 items-center">
                    
                    <!-- Imagen de la Biografía -->
                    <div class="w-full lg:w-1/2">
                        @if($biography->image_path)
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                                <div class="absolute inset-0 bg-brand-red/20 mix-blend-overlay z-10 group-hover:bg-transparent transition-all duration-500"></div>
                                <img src="{{ asset('storage/' . $biography->image_path) }}" alt="{{ $biography->title }}" class="w-full h-auto object-cover object-center grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out transform group-hover:scale-105">
                                <!-- Red accent line -->
                                <div class="absolute bottom-0 left-0 w-full h-2 bg-brand-red z-20"></div>
                            </div>
                        @else
                            <div class="aspect-[3/4] bg-brand-black rounded-2xl flex items-center justify-center border border-white/5 shadow-2xl">
                                <span class="text-brand-gray text-xl font-light">Foto no disponible</span>
                            </div>
                        @endif
                    </div>

                    <!-- Texto de la Biografía -->
                    <div class="w-full lg:w-1/2">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-1 bg-brand-red"></div>
                            <h2 class="text-brand-red font-bold uppercase tracking-widest">{{ $biography->title }}</h2>
                        </div>
                        
                        <h3 class="text-4xl md:text-5xl font-black mb-8 leading-tight">La velocidad en la sangre</h3>
                        
                        <div class="prose prose-invert prose-lg prose-p:text-gray-300 prose-p:leading-relaxed max-w-none">
                            {!! nl2br(e($biography->content)) !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20">
                    <h2 class="text-3xl font-bold text-brand-gray mb-4">Aún no hay biografía disponible</h2>
                    <p class="text-gray-500">El administrador está preparando esta sección.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Secciones Dinámicas -->
    @foreach($sections as $index => $section)
        @php
            $bgClass = ($index % 2 == 0) ? 'bg-brand-black' : 'bg-brand-dark';
            $align = $section->image_alignment ?? 'left';
        @endphp
        
        <section class="py-24 px-6 relative {{ $bgClass }} overflow-hidden">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex items-center gap-4 mb-12 {{ $align == 'top' ? 'justify-center' : '' }}">
                    <div class="w-12 h-1 bg-brand-red"></div>
                    <h2 class="text-3xl md:text-5xl font-black uppercase tracking-widest text-white">{{ $section->title }}</h2>
                </div>

                <div class="relative">
                    <div class="flex {{ $align == 'top' ? 'flex-col items-center' : 'flex-col lg:flex-row' }} gap-12">
                        @if($section->image_path)
                            <div class="w-full {{ $align == 'top' ? 'max-w-4xl mb-6' : 'lg:w-1/2' }} {{ $align == 'right' ? 'order-1 lg:order-2' : 'order-1' }}">
                                <div class="rounded-2xl overflow-hidden shadow-2xl relative">
                                    <img src="{{ asset('storage/' . $section->image_path) }}" alt="{{ $section->title }}" class="w-full h-auto object-cover {{ $align == 'top' ? 'max-h-[600px]' : '' }}">
                                </div>
                            </div>
                        @endif
                        
                        <div class="w-full {{ ($section->image_path && $align != 'top') ? 'lg:w-1/2' : '' }} {{ $align == 'right' ? 'order-2 lg:order-1' : 'order-2' }}">
                            <div class="prose prose-invert prose-lg prose-p:text-gray-300 prose-p:leading-relaxed max-w-none {{ $align == 'top' ? 'text-center mx-auto' : '' }}">
                                {!! nl2br(e($section->body)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- Estadísticas Animadas -->
    <section id="estadisticas" class="py-20 px-6 bg-brand-red text-white relative">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center" id="stats-container">
                <div class="stat-item">
                    <div class="text-6xl md:text-7xl font-black mb-2 tracking-tighter drop-shadow-md">
                        <span class="counter" data-target="156">0</span>+
                    </div>
                    <div class="text-xl font-bold uppercase tracking-widest text-white/80">Carreras Corridas</div>
                </div>
                <div class="stat-item">
                    <div class="text-6xl md:text-7xl font-black mb-2 tracking-tighter drop-shadow-md">
                        <span class="counter" data-target="42">0</span>
                    </div>
                    <div class="text-xl font-bold uppercase tracking-widest text-white/80">Podios Obtenidos</div>
                </div>
                <div class="stat-item">
                    <div class="text-6xl md:text-7xl font-black mb-2 tracking-tighter drop-shadow-md">
                        <span class="counter" data-target="8">0</span>
                    </div>
                    <div class="text-xl font-bold uppercase tracking-widest text-white/80">Años de Experiencia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Opciones de Suscripción -->
    <section id="suscripciones" class="py-24 px-6 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] bg-brand-black relative">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-black to-transparent opacity-90"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black tracking-widest text-white mb-4">Opciones de <span class="text-brand-red">Suscripción</span></h2>
                <p class="text-brand-gray text-xl max-w-2xl mx-auto font-light">Únete a Conejo Club. Sé parte de esta historia. ¡¡¡Vamos juntos a la Fórmula 1!!!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto group-cards">
                <!-- Club Oro -->
                <div class="bg-white text-brand-black rounded-lg overflow-hidden flex flex-col shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.2)]">
                    <div class="bg-gray-100 p-8 flex justify-center items-center border-b border-gray-200">
                        <h3 class="text-4xl font-black text-brand-red tracking-tighter italic">CANTÚ<span class="text-brand-black">88</span></h3>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-2xl font-bold mb-1">Club Oro</h4>
                        <div class="font-black text-3xl mb-6">MXN 180 <span class="text-sm text-gray-500 font-normal">/ mes</span></div>
                        <a href="#" class="block text-center w-full bg-brand-black text-white font-bold py-3 rounded hover:bg-brand-red transition-colors mb-6">Registrarse</a>
                        
                        <p class="text-sm text-gray-600 mb-4 line-clamp-4">Quiero que formes parte real de este camino y que te conviertas en parte del equipo.<br><br>Tendrás acceso a noticias, beneficios y contenido exclusivo, pero sobre todo, serás parte de este gran proyecto.</p>
                        
                        <ul class="space-y-3 mt-4 text-sm font-medium flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-brand-red mt-1">•</span> Acceso a contenido exclusivo
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Club Titanio -->
                <div class="bg-white text-brand-black rounded-lg overflow-hidden flex flex-col shadow-[0_0_20px_rgba(230,32,32,0.2)] relative transform md:-translate-y-4 border-2 border-brand-red transition-all duration-300 hover:-translate-y-6 hover:shadow-[0_0_40px_rgba(230,32,32,0.4)]">
                    <div class="bg-brand-black text-white text-xs font-bold text-center py-2 uppercase tracking-widest">Lo Más Popular</div>
                    <div class="bg-gray-100 p-8 flex justify-center items-center border-b border-gray-200">
                        <h3 class="text-4xl font-black text-brand-red tracking-tighter italic">CANTÚ<span class="text-brand-black">88</span></h3>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-2xl font-bold mb-1">Club Titanio</h4>
                        <div class="font-black text-3xl mb-6">MXN 760 <span class="text-sm text-gray-500 font-normal">/ mes</span></div>
                        <a href="#" class="block text-center w-full bg-brand-black text-white font-bold py-3 rounded hover:bg-brand-red transition-colors mb-6">Registrarse</a>
                        
                        <p class="text-sm text-gray-600 mb-4">Quiero que formes parte real de este camino y que te conviertas en parte del equipo.<br><br>Tendrás acceso a noticias, beneficios y contenido exclusivo, pero sobre todo, serás parte de este gran proyecto.</p>
                        
                        <div class="text-sm font-bold italic mb-3">Incluye todo Club Oro +:</div>
                        <ul class="space-y-3 text-sm font-medium flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="text-brand-red mt-1">•</span> + Descuentos en merch oficial
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Club Elite -->
                <div class="bg-white text-brand-black rounded-lg overflow-hidden flex flex-col shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(230,190,32,0.3)]">
                    <div class="bg-gray-100 p-8 flex justify-center items-center border-b border-gray-200">
                        <h3 class="text-4xl font-black text-brand-red tracking-tighter italic">CANTÚ<span class="text-brand-black">88</span></h3>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h4 class="text-2xl font-bold mb-1">Club Elite</h4>
                        <div class="font-black text-3xl mb-6">MXN 1,880 <span class="text-sm text-gray-500 font-normal">/ mes</span></div>
                        <a href="#" class="block text-center w-full bg-brand-black text-white font-bold py-3 rounded hover:bg-brand-red transition-colors mb-6">Registrarse</a>
                        
                        <p class="text-sm text-gray-600 mb-4">Quiero que formes parte real de este camino y que te conviertas en parte del equipo.<br><br>Tendrás acceso a noticias, beneficios y contenido exclusivo, pero sobre todo, serás parte de este gran proyecto.</p>
                        
                        <div class="text-sm font-bold italic mb-3">Incluye todo Club Oro y Club Titanio +:</div>
                        <ul class="space-y-3 text-sm font-medium flex-grow">
                            <li class="flex items-start gap-2 font-bold">
                                <span class="text-brand-red mt-1">•</span> + Convivencia VIP con el piloto
                            </li>
                        </ul>
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
