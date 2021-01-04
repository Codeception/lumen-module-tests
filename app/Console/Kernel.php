<?php

declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

final class Kernel extends ConsoleKernel
{
    /** @var array */
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule): void
    {
        //
    }
}
