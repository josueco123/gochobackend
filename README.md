# gochobackend

Para instalar el backend en un servidor local se necesitan las siguientes herramientas
-php versión 8.0
-composer versión 2+ 
También es necesario tener un motor de base de datos mysql por lo cual se recomienda tener instalado algún servidor de aplicaciones como xampp, wampserver o el de su preferencia.

para descargar el proyecto se debe clonar desde git con el siguiente comando 

git clone --branch master https://github.com/josueco123/gochobackend.git
una vez descargado el proyecto se ingresa a la carpeta principal desde cualquier terminal con el comando 
-cd gochobackend

con el composer ya instalados procedemos a instalar los paquetes necesarios para su funcionamiento con el siguiente comando

-composer install

con estos comandos se tiene instalados todos los paquetes necesarios para ejecutar la app, luego se tiene que configurar la aplicación para esto se debe crear una base de datos e importar el archivo sql enviado, después debes modificar en el archivo .env se el usuario y clave de la base de datos.

como paso siguiente se ejecuta la app en un servidor con el siguiente comando.

php artisan serve
