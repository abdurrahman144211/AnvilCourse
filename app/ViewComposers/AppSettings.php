<?php

namespace App\ViewComposers;

use App\Repositories\Contracts\AppSettingsRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AppSettings
{
    /**
     * App Settings cache key
     */
    protected const CACHE_KEY = 'app.present';


    /**
     * @var AppSettingsRepositoryInterface
     */
    protected $settings;


    /**
     * @var
     * App settings value
     */
    protected $data;

    /**
     * AppSettings constructor.
     * @param AppSettingsRepositoryInterface $settings
     */
    public function __construct(AppSettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        if (! $this->data) {
            $this->data = $this->resolveSettings();
        }

        return $view->with('appPresent', $this->data);
    }

    /**
     * @return mixed
     */
    public function resolveSettings()
    {
        return Cache::rememberForever(static::CACHE_KEY, function () {
            return $this->settings->first();
        });
    }
}
