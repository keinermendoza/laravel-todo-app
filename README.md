## Agregar breeze

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```
## Requerir verificacion de email

copiar el siguiente codigo
```php
// app/Models/User.php
class User extends Authenticatable implements MustVerifyEmail

// app/routes/web.php

Route::middleware(['auth', 'verified'])->group(function () {
    ...
}
```

Activar el envio de emails alterando el valor de las variables de entorno:

- MAIL_MAILER
- MAIL_SCHEME
- MAIL_ENCRYPTION
- MAIL_HOST
- MAIL_PORT
- MAIL_USERNAME
- MAIL_PASSWORD
- MAIL_FROM_ADDRESS

## Agregar soporte para español

```bash
composer require laravel-lang/lang --dev
php artisan lang:add es
```

Cambiar tambien las variables de entorno

- APP_LOCALE=es
- APP_FALLBACK_LOCALE=es
- APP_FAKER_LOCALE=es

## Agregando un sistema de permisos similar al de Django
```
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

```php
// app/Models/User.php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail {
use HasRoles;
...
};
```



## Aplicar seeder con base de datos fresca

php artisan migrate:fresh --seed --seeder=MeAndMyTodosSeeder


## Hacer deploy en Hostinguer sin tener acceso SSH

Gerenciar dominio

En la barra lateral seleccionar opciones avanzadas
- Agregar repositorio con GIT
- Activar implementacion automatica, addicionar webhook en github
- Traer codigo con el boton Implementar
- Crear Base de Datos
- Con el Administrador de Archivos: 
    - Mover todos los archivos del proyecto afuera de public_html
    - Crear archivo .env
    - Agregar valores de la base de datos al archivo .env
    - Mover todo lo que está en public a html_public
    - Subir la carpeta build de vite dentro de la carpeta **public**
- migrar la base de datos usando un custom cron job que corra cada minuto, hora, mes, semana con el siguiente codigo

```bash
/usr/bin/php /home/<remplazaru123456789>/domains/<remplazar.com>/artisan migrate --force
```

## Activar imagenes

php artisan storage:link
ln -s /home/<remplazaru123456789>/domains/<remplazar.com>/storage/app/public /home/<remplazaru123456789>/domains/<remplazar.com>/public_html