<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
=======
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
>>>>>>> master
=======
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
>>>>>>> 40fc94a (Initial commit)
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
<<<<<<< HEAD
<<<<<<< HEAD
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
=======
        'guard' => 'web',
        'passwords' => 'users',
>>>>>>> master
=======
        'guard' => 'web',
        'passwords' => 'users',
>>>>>>> 40fc94a (Initial commit)
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
<<<<<<< HEAD
<<<<<<< HEAD
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
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
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
<<<<<<< HEAD
<<<<<<< HEAD
            'model' => env('AUTH_MODEL', App\Models\User::class),
=======
            'model' => App\Models\User::class,
>>>>>>> master
=======
            'model' => App\Models\User::class,
>>>>>>> 40fc94a (Initial commit)
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
<<<<<<< HEAD
<<<<<<< HEAD
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
=======
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
>>>>>>> master
=======
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
>>>>>>> 40fc94a (Initial commit)
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
<<<<<<< HEAD
<<<<<<< HEAD
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
=======
            'table' => 'password_reset_tokens',
>>>>>>> master
=======
            'table' => 'password_reset_tokens',
>>>>>>> 40fc94a (Initial commit)
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
<<<<<<< HEAD
<<<<<<< HEAD
    | window expires and users are asked to re-enter their password via the
=======
    | times out and the user is prompted to re-enter their password via the
>>>>>>> master
=======
    | times out and the user is prompted to re-enter their password via the
>>>>>>> 40fc94a (Initial commit)
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

<<<<<<< HEAD
<<<<<<< HEAD
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
=======
    'password_timeout' => 10800,
>>>>>>> master
=======
    'password_timeout' => 10800,
>>>>>>> 40fc94a (Initial commit)

];
