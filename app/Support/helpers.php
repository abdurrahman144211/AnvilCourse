<?php

if(! function_exists('presentation')) {
    function presentation($key)
    {
        return \Illuminate\Support\Facades\Cache::get("app.presentation.{$key}");
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
