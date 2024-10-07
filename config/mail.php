<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
=======
=======
>>>>>>> 40fc94a (Initial commit)
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover", "roundrobin"
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'mailers' => [
<<<<<<< HEAD
<<<<<<< HEAD

        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
=======
=======
>>>>>>> 40fc94a (Initial commit)
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
<<<<<<< HEAD
<<<<<<< HEAD
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
=======
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
>>>>>>> master
=======
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
>>>>>>> 40fc94a (Initial commit)
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
<<<<<<< HEAD
<<<<<<< HEAD
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
=======
            // 'message_stream_id' => null,
>>>>>>> master
=======
            // 'message_stream_id' => null,
>>>>>>> 40fc94a (Initial commit)
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

<<<<<<< HEAD
<<<<<<< HEAD
        'resend' => [
            'transport' => 'resend',
=======
=======
>>>>>>> 40fc94a (Initial commit)
        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
<<<<<<< HEAD
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
=======
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
>>>>>>> master
=======
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
>>>>>>> 40fc94a (Initial commit)
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 40fc94a (Initial commit)
    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
];
