TaskManager READme backend


Pasos previos:

Instalar XXAMP y activar MySQL y Apache
En la config de apache, en el archivo de PHP.ini descomentar extension=zip y guarda archivo

https://www.apachefriends.org/es/download.html


Descargar composer para instalar dependencias
https://getcomposer.org/download/

(tener una version actualizada de php 8.0 o superior)

Clonar repositorio de GitHub y ejectuar composer install

Abrir phpMyAdmin creando una base de datos llamada taskmanager configurando a base de datos del archivo .env asi
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=root
DB_PASSWORD=

Ejecutar 
php artisan install:api
php artisan migrate  para crear las tablas
php artisan db:seed  para cargar unas actividaes ya existentes
php artisan serve    para inicializar el servidor 