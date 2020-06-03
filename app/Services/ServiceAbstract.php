<?php

namespace App\Services;

abstract class ServiceAbstract
{
    abstract public function handle($data = []);
}
