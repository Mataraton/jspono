<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration determines the settings for cross-origin requests
    | that can be executed in web browsers. Adjust these settings as needed.
    |
    */

    'paths' => ['api/*', 'usuarios'], // Incluye las rutas que deseas permitir
    'allowed_methods' => ['*'], // Permite todos los métodos HTTP
    'allowed_origins' => ['http://localhost:8100'], // Especifica tu frontend aquí
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Permite todos los encabezados
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];