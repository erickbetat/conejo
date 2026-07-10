<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones | Conejo Cantú</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-brand-black text-gray-300 antialiased selection:bg-brand-red selection:text-white">
    <!-- Navbar (Simplified) -->
    <nav class="fixed top-0 w-full z-50 bg-brand-black/90 backdrop-blur-md border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 transition-transform hover:scale-105">
                <img src="{{ asset('images/logos/letrero-conejo2.png') }}" alt="Conejo Cantú" class="h-6 md:h-8 w-auto object-contain">
            </a>
            <a href="/" class="text-white hover:text-brand-red uppercase font-racing tracking-widest transition-colors">Volver al Inicio</a>
        </div>
    </nav>

    <main class="pt-32 pb-24 px-6 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-racing text-white uppercase tracking-wide mb-8">Términos y Condiciones</h1>
        
        <div class="max-w-none space-y-6 text-gray-400 font-light leading-relaxed">
            <p><strong>Última actualización:</strong> {{ date('d/m/Y') }}</p>

            <p>Bienvenido al sitio web oficial de Conejo Cantú, operado por <strong>Carreras Conejos AC</strong>. Al acceder y utilizar este sitio web, usted acepta estar sujeto a los siguientes términos y condiciones. Si no está de acuerdo con alguna parte de estos términos, no debe utilizar nuestro sitio web.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">1. Uso del Sitio Web</h2>
            <p>Usted se compromete a utilizar nuestro sitio web únicamente con fines lícitos y de una manera que no infrinja los derechos de, restrinja o inhiba el uso y disfrute de este sitio por parte de terceros.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">2. Membresías del Club</h2>
            <p>Al suscribirse al Conejo Club, usted acepta los términos específicos del paquete seleccionado (Oro, Titanio, Elite o Personalizado). Los beneficios y precios están sujetos a cambios. Nos reservamos el derecho de modificar, suspender o cancelar cualquier membresía en caso de incumplimiento de estos términos o por razones operativas, notificando previamente a los miembros afectados.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">3. Propiedad Intelectual</h2>
            <p>Todo el contenido incluido en este sitio web, como textos, gráficos, logotipos, imágenes, videos y código fuente, es propiedad exclusiva de Carreras Conejos AC o se utiliza bajo licencia. Queda estrictamente prohibida su reproducción, distribución o modificación sin autorización previa por escrito.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">4. Compras y Pagos</h2>
            <p>Todas las transacciones realizadas a través del sitio web (si las hubiera) están sujetas a disponibilidad y confirmación. Carreras Conejos AC se reserva el derecho de rechazar cualquier pedido o suscripción. Los pagos son procesados a través de plataformas de terceros seguras y están sujetos a los términos de dichos proveedores.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">5. Enlaces a Terceros</h2>
            <p>Nuestro sitio puede contener enlaces a sitios web de terceros (como redes sociales o plataformas de pago). No tenemos control sobre el contenido ni las políticas de privacidad de esos sitios, y no asumimos responsabilidad alguna por ellos.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">6. Limitación de Responsabilidad</h2>
            <p>En la máxima medida permitida por la ley, Carreras Conejos AC no será responsable de ningún daño directo, indirecto, incidental, especial o consecuente que resulte del uso o la imposibilidad de usar este sitio web o los servicios ofrecidos en él.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">7. Modificaciones a los Términos</h2>
            <p>Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. Los cambios entrarán en vigor inmediatamente después de su publicación en el sitio web. Es su responsabilidad revisar periódicamente estos términos.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">8. Ley Aplicable y Jurisdicción</h2>
            <p>Estos términos y condiciones se rigen y se interpretan de acuerdo con las leyes de los Estados Unidos Mexicanos. Para cualquier controversia derivada del presente documento, las partes se someten a la jurisdicción de los tribunales competentes en el Estado de Coahuila, renunciando a cualquier otro fuero que pudiera corresponderles por razón de sus domicilios presentes o futuros.</p>
        </div>
    </main>

    <footer class="border-t border-white/10 bg-brand-black py-8 mt-12 text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} Carreras Conejos AC. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
