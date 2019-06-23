<?php

$allowed_origin01 = env('ALLOWED_ORIGIN01', "http://localhost:3000");
$allowed_origin02 = env('ALLOWED_ORIGIN02', "http://localhost:3000");
$allowed_origin03 = env('ALLOWED_ORIGIN03', "http://localhost:3000");

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => [
        $allowed_origin01,
        $allowed_origin02,
        $allowed_origin03
    ],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => [],
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
