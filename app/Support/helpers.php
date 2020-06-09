<?php

if(! function_exists('appPresent')) {
    function appPresent($key = null)
    {
        $settings =  \Cache::rememberForever('app.present', function () {
            return resolve(\App\Repositories\Contracts\AppSettingsRepositoryInterface::class)->first();
        });

        return $key ? $settings[$key] : $settings;
    }
}

if(! function_exists('appRoles')) {
    function appRoles()
    {
        return [
            'student' => 'Student',
            'instructor' => 'Instructor',
            'administrator' => 'Administrator',
        ];
    }
}
