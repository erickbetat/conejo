# Proyecto Conejo

Bienvenido al repositorio del proyecto **Conejo**. Este es un sistema desarrollado sobre el framework [Laravel](https://laravel.com/) diseñado para ofrecer una plataforma robusta y escalable.

Actualmente el proyecto cuenta con características administrativas como la gestión de **Partners** (socios) dentro de un panel de administración (Admin).

## 🚀 Características Principales

- **Panel de Administración (Admin):** Interfaz para la gestión integral del sistema.
- **Gestión de Partners:** Módulo completo (CRUD) para registrar, editar, visualizar y eliminar socios.
- **Diseño Responsivo e Interactivo:** Vistas implementadas con Blade y compilación de recursos mediante Vite.

## 🛠️ Tecnologías Utilizadas

- **Framework:** Laravel (PHP)
- **Base de Datos:** MySQL / MariaDB (configurable)
- **Frontend:** Blade Templates, CSS/JS procesados con [Vite](https://vitejs.dev/)
- **Control de Versiones:** Git

## 📋 Requisitos Previos

Asegúrate de tener instalados los siguientes requerimientos en tu entorno local antes de continuar:

- **PHP** >= 8.1
- **Composer** (Gestor de dependencias de PHP)
- **Node.js** y **npm** (Para compilar los assets del frontend)
- **Servidor de Base de Datos** (MySQL, PostgreSQL, SQLite, etc.)

## ⚙️ Instalación y Configuración Local

Sigue estos pasos para levantar el entorno de desarrollo en tu máquina local:

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/erickbetat/conejo.git
   cd conejo
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Configurar las variables de entorno**
   Copia el archivo de ejemplo para crear tu propio archivo `.env`:
   ```bash
   cp .env.example .env
   ```
   *Nota: Asegúrate de configurar correctamente los datos de conexión a tu base de datos en el archivo `.env` (DB_DATABASE, DB_USERNAME, DB_PASSWORD).*

4. **Generar la clave de la aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar las migraciones (Base de Datos)**
   ```bash
   php artisan migrate
   ```
   *Esto creará las tablas necesarias, incluyendo la tabla `partners` y las tablas por defecto de Laravel.*

6. **Instalar y compilar los recursos del frontend**
   ```bash
   npm install
   npm run dev
   ```

7. **Iniciar el servidor de desarrollo**
   En una nueva terminal, levanta el servidor de PHP:
   ```bash
   php artisan serve
   ```
   La aplicación estará disponible en `http://localhost:8000`.

## 📂 Estructura del Código

Algunas de las rutas y directorios más relevantes implementados para este proyecto:
- `app/Models/Partner.php` - Modelo de datos para los socios.
- `app/Http/Controllers/Admin/PartnerController.php` - Controlador lógico para el panel de administración.
- `database/migrations/` - Archivos para la creación y alteración de tablas.
- `resources/views/admin/partner/` - Vistas Blade para el panel de administración (index, create, edit).

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](https://opensource.org/licenses/MIT).
