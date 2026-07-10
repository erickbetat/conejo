<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de Privacidad | Conejo Cantú</title>
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
        <h1 class="text-4xl md:text-5xl font-racing text-white uppercase tracking-wide mb-8">Aviso de Privacidad</h1>
        
        <div class="max-w-none space-y-6 text-gray-400 font-light leading-relaxed">
            <p><strong>Última actualización:</strong> {{ date('d/m/Y') }}</p>

            <p>En cumplimiento con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la "Ley") vigente en México, <strong>Carreras Conejos AC</strong> (en adelante, "El Responsable"), con domicilio en el Estado de Coahuila, México, es responsable del tratamiento y protección de sus datos personales.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">1. Datos Personales Recabados</h2>
            <p>Los datos personales que recabamos de usted a través de nuestro formulario de contacto o al suscribirse a nuestros servicios pueden incluir, de manera enunciativa más no limitativa:</p>
            <ul class="list-disc pl-5 space-y-2 mt-4">
                <li>Nombre completo</li>
                <li>Dirección de correo electrónico</li>
                <li>Número de teléfono</li>
                <li>Datos necesarios para procesar pagos (gestionados a través de terceros seguros)</li>
            </ul>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">2. Finalidad del Tratamiento de Datos</h2>
            <p>Su información personal será utilizada para las siguientes finalidades principales:</p>
            <ul class="list-disc pl-5 space-y-2 mt-4">
                <li>Proveer los servicios y productos que ha solicitado (ej. membresías, mercancía).</li>
                <li>Responder a sus mensajes y solicitudes de contacto.</li>
                <li>Notificarle sobre nuevos servicios, productos, eventos o cambios en los mismos.</li>
                <li>Evaluar la calidad del servicio que le brindamos.</li>
            </ul>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">3. Uso de Cookies</h2>
            <p>Nuestro sitio web utiliza cookies y tecnologías similares para mejorar su experiencia de usuario, analizar el tráfico del sitio y personalizar el contenido. Al utilizar nuestro sitio web y aceptar nuestro banner de cookies, usted consiente el uso de estas tecnologías. Usted puede deshabilitar las cookies desde las configuraciones de su navegador.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">4. Derechos ARCO</h2>
            <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>
            <p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva enviando un correo electrónico a <strong>contacto@conejocantu.com</strong>.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">5. Modificaciones al Aviso de Privacidad</h2>
            <p>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos. Estas modificaciones estarán disponibles al público a través de esta misma página web.</p>

            <h2 class="text-2xl font-racing text-white uppercase mt-12 mb-4">6. Jurisdicción</h2>
            <p>Este Aviso de Privacidad se rige por la legislación aplicable y vigente en los Estados Unidos Mexicanos. Cualquier controversia que se derive de su aplicación se someterá a la jurisdicción de los tribunales competentes en el Estado de Coahuila.</p>
        </div>
    </main>

    <footer class="border-t border-white/10 bg-brand-black py-8 mt-12 text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} Carreras Conejos AC. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
