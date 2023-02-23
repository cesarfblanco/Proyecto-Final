<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
   | Proveedores de usuarios
     |----------------------------------------------------------------- -------------------------
     |
     | Todos los controladores de autenticación tienen un proveedor de usuarios. Esto define cómo el
     | los usuarios se recuperan de su base de datos u otro almacenamiento
     | mecanismos utilizados por esta aplicación para conservar los datos de su usuario.
     |
     | Si tiene varias tablas de usuarios o modelos, puede configurar varios
     | Fuentes que representan cada modelo/tabla. Estas fuentes pueden entonces
     | asignarse a cualquier guardia de autenticación adicional que haya definido.
     |
     | Compatible: "base de datos", "elocuent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
| Puede especificar varias configuraciones de restablecimiento de contraseña si tiene más
     | más de una tabla de usuario o modelo en la aplicación y desea tener
     | configuraciones de restablecimiento de contraseña separadas según los tipos de usuario específicos.
     |
     | El tiempo de caducidad es la cantidad de minutos que cada token de reinicio será
     | considerado válido. Esta función de seguridad hace que los tokens duren poco, por lo que
     | tienen menos tiempo para ser adivinados. Puede cambiar esto según sea necesario.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
        | Tiempo de espera de confirmación de contraseña
    |----------------------------------------------------------------- -------------------------
    |
    | Aquí puede definir la cantidad de segundos antes de una confirmación de contraseña
    | se agota y se le pide al usuario que vuelva a ingresar su contraseña a través del
    | pantalla de confirmación De forma predeterminada, el tiempo de espera dura tres horas
    */

    'password_timeout' => 10800,

];
