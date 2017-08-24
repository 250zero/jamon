 <h1>Jamon</h1>
 <p>La solucion mas rapida y eficiente para cuentas por pagar, dirigido para los prestamistas.</p>

<h2>Instalación</h2>
<p>Este proyecto esta hecho en php, con el framework laravel, acontinuacion muestro como hacer la instalación del mismo;</p>
<ul>
    <li>En la terminar, se posicionan en el root del apache o server que tengan.</li>
    <li>git clone https://github.com/250zero/jamon.git</li>
    <li>Acceden a la carpeta jamon</li>
    <li>composer install</li>
    <li>php -r "file_exists('.env') || copy('.env.example', '.env');"</li>
    <li>Seteamos en el archivo .env las credenciales de Base de datos, donde la base de datos es "jamon"</li>
    <li>Una vez creada la base de datos nos vamos a la consola y insertamos la siguiente instruccion</li>
    <li>php artisan migrate:refresh --seed</li>
</ul>