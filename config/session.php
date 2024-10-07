<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
=======
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
>>>>>>> master
=======
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
>>>>>>> 40fc94a (Initial commit)
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

<<<<<<< HEAD
<<<<<<< HEAD
    'driver' => env('SESSION_DRIVER', 'database'),
=======
    'driver' => env('SESSION_DRIVER', 'file'),
>>>>>>> master
=======
    'driver' => env('SESSION_DRIVER', 'file'),
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
<<<<<<< HEAD
<<<<<<< HEAD
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
=======
    | to immediately expire on the browser closing, set that option.
>>>>>>> master
=======
    | to immediately expire on the browser closing, set that option.
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

<<<<<<< HEAD
<<<<<<< HEAD
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),
=======
    'expire_on_close' => false,
>>>>>>> master
=======
    'expire_on_close' => false,
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
<<<<<<< HEAD
<<<<<<< HEAD
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | should be encrypted before it is stored. All encryption will be run
    | automatically by Laravel and you can use the Session like normal.
    |
    */

    'encrypt' => false,
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
=======
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
>>>>>>> master
=======
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | When using the "database" session driver, you may specify the table we
    | should use to manage the sessions. Of course, a sensible default is
    | provided for you; however, you are free to change this as needed.
    |
    */

    'table' => 'sessions',
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
=======
    | While using one of the framework's cache driven session backends you may
    | list a cache store that should be used for these sessions. This value
    | must match with one of the application's configured cache "stores".
>>>>>>> master
=======
    | While using one of the framework's cache driven session backends you may
    | list a cache store that should be used for these sessions. This value
    | must match with one of the application's configured cache "stores".
>>>>>>> 40fc94a (Initial commit)
    |
    | Affects: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
=======
    | Here you may change the name of the cookie used to identify a session
    | instance by ID. The name specified here will get used every time a
    | new session cookie is created by the framework for every driver.
>>>>>>> master
=======
    | Here you may change the name of the cookie used to identify a session
    | instance by ID. The name specified here will get used every time a
    | new session cookie is created by the framework for every driver.
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
<<<<<<< HEAD
<<<<<<< HEAD
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | your application but you are free to change this when necessary.
    |
    */

    'path' => '/',
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains. Typically, this shouldn't be changed.
=======
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
>>>>>>> master
=======
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
<<<<<<< HEAD
<<<<<<< HEAD
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | the HTTP protocol. You are free to modify this option if needed.
    |
    */

    'http_only' => true,
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
<<<<<<< HEAD
<<<<<<< HEAD
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
=======
    | will set this value to "lax" since this is a secure default value.
>>>>>>> master
=======
    | will set this value to "lax" since this is a secure default value.
>>>>>>> 40fc94a (Initial commit)
    |
    | Supported: "lax", "strict", "none", null
    |
    */

<<<<<<< HEAD
<<<<<<< HEAD
    'same_site' => env('SESSION_SAME_SITE', 'lax'),
=======
    'same_site' => 'lax',
>>>>>>> master
=======
    'same_site' => 'lax',
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

<<<<<<< HEAD
<<<<<<< HEAD
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),
=======
    'partitioned' => false,
>>>>>>> master
=======
    'partitioned' => false,
>>>>>>> 40fc94a (Initial commit)

];
