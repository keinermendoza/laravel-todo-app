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
