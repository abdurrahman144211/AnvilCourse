<?php

namespace App\Repositories\AppSettings;

use App\Models\AppSetting;
use App\Repositories\Contracts\AppSettingsRepositoryInterface;

class EloquentAppSettings implements AppSettingsRepositoryInterface
{
    /**
     * @var AppSetting
     */
    protected $settings;

    /**
     * EloquentAppSettings constructor.
     * @param AppSetting $settings
     */
    public function __construct(AppSetting $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->settings->first();
    }
}
