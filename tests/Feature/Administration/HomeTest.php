<?php

namespace Tests\Feature\Administration;

use Facades\Tests\Support\Factories\UserFactory;
use Illuminate\View\View;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function un_authenticated_user_cannot_view_administration_dashboard()
    {
        $this->get(route('administration.home'))->assertStatus(403);
    }

    /** @test */
    public function authenticated_administrator_can_view_administration_dashboard()
    {
        $this->signInAdministrator();

        $this->get(route('administration.home'))->assertStatus(200);
    }

    /** @test */
    public function students_cannot_see_administration_dashboard()
    {
        $this->signIn(UserFactory::create(['role' => 'student']));

        $this->get(route('administration.home'))->assertStatus(403);
    }

    /** @test */
    public function instructors_cannot_see_administration_dashboard()
    {
        $this->signIn(UserFactory::create(['role' => 'instructor']));

        $this->get(route('administration.home'))->assertStatus(403);
    }
}
