<?php

namespace App\Repositories\Contracts;

interface AppSettingsRepositoryInterface
{
    /**
     * Get app recorded settings
     * @return mixed
     */
    public function first();
}
