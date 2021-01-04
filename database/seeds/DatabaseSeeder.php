<?php

declare(strict_types=1);

use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->truncateTables(['users']);
        $this->call(UserSeeder::class);
    }

    private function truncateTables(array $tables): void
    {
        $database = app()->get(DB::class);

        Schema::disableForeignKeyConstraints();

        foreach ($tables as $table) {
            $database->table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();
    }
}
