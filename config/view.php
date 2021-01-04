<?php

declare(strict_types=1);

return [

    // View Storage Paths

    'paths' => [
        resource_path('views'),
    ],

    // Compiled View Path

    'compiled' => realpath(storage_path('framework/views')),

];
