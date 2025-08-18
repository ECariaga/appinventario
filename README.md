# App Inventario CACHS

[![Laravel](https://img.shields.io/badge/Laravel-9.x-red)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-%3E%3D8.0-blue)](https://www.php.net/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)](https://getbootstrap.com/)
[![Composer](https://img.shields.io/badge/Composer-Dependency%20Manager-orange)](https://getcomposer.org/)

La **App Inventario CACHS** es una aplicación web diseñada para mantener un control detallado de los aparatos tecnológicos del **Colegio Aurora de Chile Sur**. Permite llevar un registro completo de las existencias, almacenando información esencial como cantidad, marca, modelo, estado, ubicación y más.

Actualmente, la aplicación puede ejecutarse de forma local, aunque también puede ser instalada en un servidor privado si se requiere.

---

## Tecnologías utilizadas

- **Backend:** [PHP](https://www.php.net/) con [Laravel 9](https://laravel.com/)
- **Base de datos:** [MySQL](https://www.mysql.com/)
- **Frontend:** [Bootstrap 5](https://getbootstrap.com/)
- **Gestión de dependencias:** [Composer](https://getcomposer.org/)

---

## Funcionalidades principales

La aplicación cuenta con **tres secciones principales**:

### 1. Inventario
- Muestra una tabla con todos los artículos registrados.  
- Información por artículo: **Nombre, Marca, Modelo, Número de serie, Cantidad, Estado, Ubicación y Foto**.  
- Acciones disponibles:
  - Ver detalle
  - Editar
  - Eliminar
  - Agregar nuevos artículos (botón superior de la tabla)

### 2. Reportes
- Permite **generar un archivo Excel** con todos los artículos registrados.  
- La información se organiza automáticamente en una tabla para facilitar su análisis.

### 3. Usuarios
- Despliega la lista de usuarios registrados.  
- Permite eliminar usuarios no deseados para mantener el control de accesos.

---

## Instalación y configuración

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/ECariaga/appinventario.git
   ```
2. Instalar dependencias con Composer:
   ```bash
   composer install
   ```
3. Configurar el archivo .env para la conexión a la base de datos MySQL.
   ```bash
    APP_NAME=InventarioCACHS
    APP_ENV=local
    APP_KEY=base64:GENERAR_LUEGO_CON_ARTISAN
    APP_DEBUG=true
    APP_URL=http://localhost
    
    LOG_CHANNEL=stack
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=inventario_cachs
    DB_USERNAME=root
    DB_PASSWORD=
    
    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
 
   ```
4. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate 
   ```
5. Ejecutar las migraciones:
   ```bash
   php artisan migrate 
   ```
6. Iniciar el servidor local:
   ```bash
   php artisan serve 
   ```
7. Acceder desde el navegador:
   ```bash
   http://localhost:8000
   ```

 ---

 ## Requisitos

- PHP >= 8.0
- Composer instalado
- MySQL o servidor de base de datos compatible
