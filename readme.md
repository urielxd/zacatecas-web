# Instrucciones
* Descarga e instala Node.js [Enlace de descarga](https://nodejs.org/es/download/)
* Descarga e instala Git [Enlace de descarga](https://git-scm.com/downloads)
* Abre Documentos, Videos , Escritorio o donde quieras descargar el código de tu proyecto, y en una parte en blanca presiona shift y click derecho, te saldrán algunas opciones selecciona la de git prompt here o git bash here ( algo así). Te abrirá una ventana de comandos escribe: `git clone https://github.com/urielxd/zacatecas-web.git`.
*  Instala Xampp (La que tiene la versión de php 7.2.11) [Enlace de descarga](https://www.apachefriends.org/es/index.html)
* Descarga e instala composer [Link  de descarga](https://getcomposer.org/)
* Descarga e instala laravel 5.7 [Instrucciones de instalación](https://laravel.com/docs/5.7)
* Crea una base de datos llamada **zacatecas**
* Abre la carpeta del proyecto con tu editor de código ( sublime text, visual code, atom , etc.. ).
* Localiza el archivo llamado **.env.example** que se encuentra en la raiz del proyecto. Borra el .example y tiene que quedar **.env**.
* Abre el archivo **.env**, y localiza las siguientes lineas.
`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=homestead`
`DB_USERNAME=homestead`
`DB_PASSWORD=secret`
* Tiene que quedar asi:
`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=zacatecas`
`DB_USERNAME=root`
`DB_PASSWORD=root`
* Enciende Xampp
* Abre con el explorar de archivos la carpeta que contiene el proyecto, y en una parte en blanca presiona shift y click derecho, te saldrán algunas opciones selecciona la de git prompt here o git bash here ( algo así). Te abrirá una ventana de comandos escribe: `composer update`
* Cuando termine , escribe `php artisan migrate` y presiona enter.  Si te marca error ,  revisa los datos de tu base de datos este bien en .env 
* Si todo salió bien escribe `npm install`
* Escribe `php artisan serve`, y en el navegador escribe la url `localhost:8000` ahi estará corriendo el proyecto. 
* El usuario por defecto es **admin@mail.com** y la contraseña **123456**

## Si ya realizaste lo anterior
* Una vez que hayas realizado los pasos anteriores, cada vez que quieras ver el proyecto, harás lo siguiente, Enciendes xampp y abres la carpeta que contiene tu proyecto y en una parte en blanca presiona shift y click derecho, te saldrán algunas opciones selecciona la de git prompt here o git bash here ( algo así). Te abrirá una ventana de comandos escribe: `php artisan serve`
 
