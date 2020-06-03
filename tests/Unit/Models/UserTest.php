<?php

namespace Tests\Unit\Models;

use App\Models\Instructor;
use Facades\Tests\Support\Factories\UserFactory;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_check_if_user_is_an_administrator()
    {
        $roles = ['student', 'instructor', 'administrator'];

        $user1 = UserFactory::create(['role' => $roles[rand(0, 1)]]);
        $user2 = UserFactory::create(['role' => $roles[2]]);

        $this->assertFalse($user1->isAdministrator());
        $this->assertTrue($user2->isAdministrator());
    }

    /** @test */
    public function it_can_check_if_user_is_an_instructor()
    {
        $roles = ['student', 'instructor', 'administrator'];

        $user1 = UserFactory::create(['role' => $roles[0]]);
        $user2 = UserFactory::create(['role' => $roles[rand(1, 2)]]);

        $this->assertFalse($user1->isInstructor());
        $this->assertTrue($user2->isInstructor());
    }

    /** @test */
    public function instructor_user_has_a_instructor_profile()
    {
        $user = UserFactory::withInstructorProfile()->create();

        $this->assertInstanceOf(Instructor::class, $user->instructorProfile);
    }

}
