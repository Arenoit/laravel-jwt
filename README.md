# Laravel 8x

## Installation

Para que Laravel funcione en versión 8 es necesario editar los valores de estas variables en el archivo raiz composer.json
```json
"require": {
  "laravel/framework": "^8.0",
},
"require-dev": {
  "facade/ignition": "^2.5",
  "nunomaduro/collision": "^5.0",
  "phpunit/phpunit": "^9.3"
},
```
Luego ejecutar en la consola de comandos
```bash
composer update
```
### Extensiones instaladas
Extenciones que deben estar habilitadas el Laravel
- bz2
- curl
- fileinfo
- gd2
- gettext
- intl
- imap
- mbstring
- exif
- mysqli
- pdo_mysql
- pdo_sqlite

# Base de datos
Crear la base de datos gublin en MySQL 8.4.0 (Recomendable), caso contrario en el que quieran crear con otro nombre la base de datos editar .env en el archivo raiz

Usar este comando para migrar las tablas
```bash
php artisan migrate
```
Para que se que los datos de las tablas predefinidos se inserten usar estos 2 comandos
```bash
composer dump-autoload
php artisan migrate:fresh --seed
```
Usuario de prueba para iniciar sesión
```json
Correo: davidrylacer@gmail.com
Constraseña: 123
```

# Consideraciones
JWT funciona mejor en routes/web.php porque maneja las sessiones de usuario y solo necesitara autentificar una vez, en cambio en una API solo adentro del Controllador toca verificar a cada momento porque tiene un tiempo en que se caduca el token

## 📡 ThePetAPI - Crear Mascotas vía API (JWT)

Este endpoint permite **crear mascotas** en el sistema mediante una solicitud HTTP POST autenticada con JWT (JSON Web Token).

---

### 📍 URL del Endpoint
Endpoint para obtener información del usuario autenticado no es externa, solo se puede ver en el navegador y no se puede consultar sin ingresar con el usuario.
```http
   GET http://localhost/{carpeta_del_proyecto}/api/me
```
Enpoint externo para guardar mascotas sin autentificar usuario y constraseña
```http
   POST http://localhost/{carpeta_del_proyecto}/api/ThePetAPI
```

### 🔐 Autenticación

Este endpoint requiere un **token JWT válido** en la cabecera `Authorization`.

### 🔑 Header requerido:
El JWT_SECRET se encuentra en la raiz del proyecto en el archivo .env
```http
Authorization: Bearer JWT_SECRET_TOKEN
Content-Type: application/json
Accept: application/json

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
