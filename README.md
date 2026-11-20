# Guía Laravel 12

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/kenjyo/guia-laravel-12.git
```

Ingresar a la carpeta del proyecto:

```bash
cd guia-laravel-12
```

### 2. Instalar dependencias

```bash
composer install
```

```bash
npm install
```

### 3. Configurar el entorno

Crear el archivo `.env`:

```bash
copy .env.example .env
```

Generar la clave de la aplicación:

```bash
php artisan key:generate
```

### 4. Configurar la base de datos

Crear una base de datos llamada `proyecto_laravel` en MySQL.

Configurar la conexión en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyecto_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Ejecutar las migraciones

```bash
php artisan migrate
```

### 6. Compilar los recursos

```bash
npm run build
```

## Ejecución

### 1. Iniciar MySQL

Iniciar el servicio MySQL desde XAMPP.

### 2. Iniciar el servidor de Laravel

```bash
php artisan serve
```

### 3. Acceder al sistema

Abrir el navegador en:

```text
http://127.0.0.1:8000
```