<?php

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;

return [
    // Middleware globales
    HandleCors::class,
    SubstituteBindings::class,
    ValidatePostSize::class,
];
