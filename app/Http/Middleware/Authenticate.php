<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class Authenticate
{
    public function handle(Request $request, Closure $next, $guard = null): SymfonyResponse
    {
        $auth = app()->get(Auth::class);
        if ($auth->guard($guard)->guest()) {
            $responseFactory = app()->get(ResponseFactory::class);
            return $responseFactory->make('Unauthorized.', SymfonyResponse::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
