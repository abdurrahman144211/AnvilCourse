<?php

if(! function_exists('presentation')) {
    function presentation($key)
    {
        return \Illuminate\Support\Facades\Cache::get("app.presentation.{$key}");
    }
}
