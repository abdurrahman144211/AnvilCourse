<?php

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
