<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Fruitcake\Cors\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\AuthGates::class,
        ],
        'api' => [
            'throttle:60,1',
            'bindings',
            \App\Http\Middleware\AuthGates::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth'              => \Illuminate\Auth\Middleware\Authenticate::class,
        'verified'          => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth.basic'        => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'          => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers'     => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'               => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'             => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed'            => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'          => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'password.confirm'  => \Illuminate\Auth\Middleware\RequirePassword::class,
        'check.token'       => \App\Http\Middleware\CheckToken::class,
        'customer'          => \App\Http\Middleware\IsCustomer::class,
        'admin'             => \App\Http\Middleware\IsAdmin::class,

        /**** OTHER MIDDLEWARE ****/
        'localize'                 => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'     => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'     => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'           => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,


    ];
}
