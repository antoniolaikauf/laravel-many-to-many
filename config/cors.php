<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    // NB SE SI METTE '*' VUOL DIRE CHE PERMETTI A TUTTI DI COLLEGARSI AL TUO SERVER QUINDI è MOLTO RISCHIOSO
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    // qua ci sono tutti i metodi che vuoi usare option e un metodo che serve per laravel ma si può aggiungere sia delete put 
    'allowed_methods' => ['GET', 'POST', 'OPTION'],
    // qua si mette il link a cui vuoi far permettere di fare la chiamata ad axios e collegarsi con il tuo server 
    'allowed_origins' => ['http://localhost:5173'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
