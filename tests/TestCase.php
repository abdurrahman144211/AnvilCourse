<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Facades\Tests\Support\Factories\UserFactory;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function signInAdministrator($administrator = null)
    {
        $administrator = $administrator ?: UserFactory::create(['role' => 'administrator']);

        return $this->signIn($administrator);
    }

    public function signIn($user = null)
    {
        $user = $user ?: UserFactory::create();

        $this->actingAs($user);

        return $this;
    }
}
