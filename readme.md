 ###Jamon
 <p>La solucion mas rapida y eficiente para cuentas por pagar, dirigido a los prestamistas.</p>

<h2>Instalación</h2>
<p>Este proyecto esta hecho en php, con el framework laravel, a continuacion muestro como hacer la instalación del mismo;</p>
<ul>
    <li>En la terminar, se posiciona en el root del apache o server que tengan.</li>
    <li>git clone https://github.com/250zero/jamon.git</li>
    <li>Acceden a la carpeta jamon desde la terminal</li>
    <li>Introducimos en la raiz de la carpeta jamon  el comando "composer install"</li>
    <li>Si todo fue exitoso insertamos el siguiente comando </li>
    <li>php -r "file_exists('.env') || copy('.env.example', '.env');"</li>
    <li>Seteamos en el archivo .env las credenciales de Base de datos, donde la base de datos es "jamon"</li>
    <li>Una vez creada la base de datos nos vamos a la consola y insertamos la siguiente instrucciones:</li>
    <li>php artisan migrate:refresh --seed</li>
    <li>npm install</li>
</ul>
<p>Una vez terminado el proceso, tendremos el proyecto listo, donde las credenciales son;</p>
<ul>
    <li>Username:Admin</li>
    <li>Password:Admin123</li>
</ul>