<?php

namespace Tests\Feature\Teaching\Courses;

use Facades\Tests\Support\Factories\UserFactory;
use Tests\TestCase;

class CourseCreateTest extends TestCase
{
    /** @test */
    public function it_fails_if_authenticated_user_is_not_an_instructor()
    {
        $this->signIn(UserFactory::create(['role' => 'student']));

        $this->get(route('teaching.courses.create'))->assertStatus(403);
    }

    /** @test */
    public function an_instructor_can_see_create_course_page()
    {
        $this->signInInstructor();

        $this->get(route('teaching.courses.create'))
            ->assertStatus(200)
            ->assertViewIs('teaching.courses.create');
    }
}
