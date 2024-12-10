<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar cuál de las conexiones de base de datos de abajo
    | deseas usar como tu conexión predeterminada para las operaciones de base de datos.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Aquí están todas las conexiones de base de datos definidas para tu aplicación.
    | Puedes agregar o quitar conexiones según sea necesario.
    |
    */

    'connections' => [
        'couchdb' => [
            'driver' => 'couchdb',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 5984),
            'database' => env('DB_DATABASE', 'usuarios_db'),
            'username' => env('DB_USERNAME', 'admin'),
            'password' => env('DB_PASSWORD', 'password'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | Esta tabla mantiene el registro de todas las migraciones que ya se han ejecutado
    | para tu aplicación. Usando esta información, podemos determinar cuáles de las
    | migraciones en disco no se han ejecutado en la base de datos.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis es una tienda de valor clave avanzada, rápida y de código abierto que también
    | proporciona un conjunto más rico de comandos que un sistema de valor clave típico,
    | como Memcached. Puedes definir tus configuraciones de conexión aquí.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
