<?php

namespace Tests\Feature\Teaching\Home;

use Facades\Tests\Support\Factories\UserFactory;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function un_authenticated_user_cannot_view_administration_dashboard()
    {
        $this->get(route('teaching.home'))->assertStatus(403);
    }

    /** @test */
    public function authenticated_administrator_can_view_teaching_dashboard()
    {
        $this->signInAdministrator();

        $this->get(route('teaching.home'))->assertStatus(200);
    }

    /** @test */
    public function authenticated_instructor_can_view_teaching_dashboard()
    {
        $this->signInInstructor();

        $this->get(route('teaching.home'))->assertStatus(200);
    }

    /** @test */
    public function students_cannot_see_teaching_dashboard()
    {
        $this->signIn(UserFactory::create(['role' => 'student']));

        $this->get(route('teaching.home'))->assertStatus(403);
    }
}
