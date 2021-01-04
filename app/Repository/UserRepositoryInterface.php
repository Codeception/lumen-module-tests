<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function create(array $attributes = []): Model;
}