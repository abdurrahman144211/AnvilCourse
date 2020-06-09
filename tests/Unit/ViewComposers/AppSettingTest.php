<?php

namespace Tests\Unit\ViewComposers;

use App\Repositories\Contracts\AppSettingsRepositoryInterface;
use App\ViewComposers\AppSettings;
use Illuminate\View\View;
use Tests\TestCase;

class AppSettingTest extends TestCase
{
    /**
     * @test
     */
    public function it_passes_app_settings_data_to_view ()
    {
        $composer = app(AppSettings::class);

        $view = \Mockery::mock(View::class);

        $view->shouldReceive('with')
            ->with('appPresent', resolve(AppSettingsRepositoryInterface::class)->first())
            ->once();

        $composer->compose($view);
    }
}
