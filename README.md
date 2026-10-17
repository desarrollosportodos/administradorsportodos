# Administrador Sportodos

Panel administrativo de Sportodos construido con Laravel 8. Permite gestionar
categorías, iniciativas, puntos, usuarios y otras configuraciones del sistema.

## Requisitos

- PHP 7.3 o superior
- Composer
- Node.js y npm
- MySQL
- El proyecto de servicios de Sportodos disponible localmente en:
  `/Volumes/Documentos/Proyectos/Sportodos/servicios`

## Instalación

```bash
git clone git@github.com:desarrollosportodos/administradorsportodos.git
cd administradorsportodos
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configura en `.env` la conexión a la base de datos y la URL del proyecto de
servicios. Para desarrollo local, el administrador utiliza `ADMIN_ESTADO=0` y
consume la API en `http://localhost:8000/api`.

Ejemplo:

```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://administrador.sportodos.com
ADMIN_ESTADO=0
```

No agregues contraseñas, tokens ni otros secretos al repositorio.

## Ejecutar en desarrollo

Inicia primero el proyecto de servicios y después el administrador:

```bash
# En /Volumes/Documentos/Proyectos/Sportodos/servicios
php artisan serve --port=8000

# En este proyecto
php artisan serve --port=8001
```

En otra terminal, compila los recursos frontend:

```bash
npm run development
```

Para recompilar automáticamente durante el desarrollo:

```bash
npm run watch
```

## Comandos útiles

```bash
php artisan route:list
php artisan view:cache
php artisan config:clear
php artisan cache:clear
php artisan test
```

## Estructura principal

- `app/Http/Controllers/Admin`: controladores del panel administrativo.
- `app/Servicios/Apiservice.php`: cliente para consumir la API de servicios.
- `resources/views/admin`: vistas Blade del administrador.
- `routes/web.php`: rutas web del panel.
- `public`: archivos públicos y recursos compilados.

## Git

La rama principal es `main` y el remoto principal es `origin`:

```bash
git pull origin main
git push origin main
```

