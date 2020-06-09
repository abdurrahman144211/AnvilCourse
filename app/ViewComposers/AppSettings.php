<?php

namespace App\ViewComposers;

use App\Repositories\Contracts\AppSettingsRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AppSettings
{
    /**
     *
     */
    protected const CACHE_KEY = 'app.present';
    /**
     * @var AppSettingsRepositoryInterface
     */
    protected $settings;

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
        return $view->with([
            'appPresent' => $this->resolveSettings(),
        ]);
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
