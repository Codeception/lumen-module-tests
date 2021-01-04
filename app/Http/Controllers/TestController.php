<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class TestController
{
    public function simpleRoute(): string
    {
        return 'simple route';
    }

    public function complexRoute(string $param1, string $param2): string
    {
        return "Complex route with parameters $param1 and $param2";
    }

    public function secure(): string
    {
        return 'Secure';
    }

    public function redirect(): RedirectResponse
    {
        return redirect('/');
    }
}