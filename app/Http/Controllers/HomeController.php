<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Http\Request;

final class HomeController extends AbstractController
{
    public function __invoke(Request $request): Renderable
    {
        return app()->make('view')->make('home');
    }
}
