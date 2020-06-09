<?php

namespace Tests\Feature\Teaching\Courses;

use Facades\Tests\Support\Factories\UserFactory;
use Tests\TestCase;

class CourseStoreTest extends TestCase
{
    /** @test */
    public function it_fails_if_authenticated_user_is_not_an_instructor()
    {
        $this->signIn(UserFactory::create(['role' => 'student']));

        $this->post(route('teaching.courses.store'), [])
            ->assertStatus(403);
    }

    /** @test */
    public function it_requires_title()
    {
        $this->signInInstructor();

        $this->post(route('teaching.courses.store'), [])
            ->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function it_requires_subjects()
    {
        $this->signInInstructor();

        $this->post(route('teaching.courses.store'), [])
            ->assertSessionHasErrors(['subjects']);
    }

    /** @test */
    public function it_requires_a_valid_subjects()
    {
        $this->signInInstructor();

        $this->post(route('teaching.courses.store'), ['subjects' => []])
            ->assertSessionHasErrors(['subjects']);
    }

    /** @test */
    public function it_requires_a_short_overview()
    {
        $this->signInInstructor();

        $this->post(route('teaching.courses.store'), [])
            ->assertSessionHasErrors(['short_overview']);
    }
}
