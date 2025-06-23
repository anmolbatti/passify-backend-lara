<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'pass-update',
        'pass-update/v1/passes/*/*',
        'pass-update/v1/devices/*/registrations/*/*',
        'pass-update/v1/log',
        'plans/subscription/*/*',
        'plans/refund_callback/*/*',
        'paytabs_callback',
        'api/*'
    ];
}
