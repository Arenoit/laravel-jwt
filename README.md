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
# Consideraciones
JWT funciona mejor en routes/web.php porque maneja las sessiones de usuario y solo necesitara autentificar una vez, en cambio en una API solo adentro del Controllador toca verificar a cada momento porque tiene un tiempo en que se caduca el token

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
