<?php

namespace Tests\Feature\Administration\Users;

use App\Models\User;
use App\Notifications\Users\YouWereCreated;
use Facades\Tests\Support\Factories\UserFactory;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    public  function setUp(): void
    {
        parent::setUp();
        $this->signInAdministrator();
    }

    /** @test */
    public function an_administrator_can_see_create_user_page()
    {
        $this->get(route('administration.users.create'))
            ->assertStatus(200)
            ->assertViewIs('administration.users.create');
    }

    /** @test */
    public function it_requires_a_user_name_to_store_a_new_user()
    {
        $this->post(route('administration.users.store'))
            ->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function it_requires_a_user_email_to_store_a_new_user()
    {
        $this->post(route('administration.users.store'))
            ->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_requires_a_unique_user_email_to_store_a_new_user()
    {
        $user = UserFactory::create();

        $this->post(route('administration.users.store', ['email' => $user->email]))
            ->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_requires_a_user_password_to_store_a_new_user()
    {
        $this->post(route('administration.users.store'))
            ->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function it_requires_a_user_role_to_store_a_new_user()
    {
        $this->post(route('administration.users.store'))
            ->assertSessionHasErrors(['role']);
    }

    /** @test */
    public function it_requires_a_valid_user_role_to_store_a_new_user()
    {
        $this->post(route('administration.users.store', [
            'role' => 'invalid role',
        ]))->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function an_administrator_can_store_a_new_user_into_users_table()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('administration.users.store', $this->handleUser()));

        $user = User::orderBy('id', 'desc')->first();

        $response->assertRedirect(route('administration.users.show', $user->id));

        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    /** @test */
    public function it_create_an_instructor_profile_when_created_user_was_an_administrator()
    {
        $this->post(route('administration.users.store', $this->handleUser('administrator')));

        $user = User::orderBy('id', 'desc')->first();

        $this->assertNotNull($user->instructorProfile);
    }

    /** @test */
    public function it_create_an_instructor_profile_when_created_user_was_an_instructor()
    {
        $this->post(route('administration.users.store', $this->handleUser('instructor')));

        $user = User::orderBy('id', 'desc')->first();

        $this->assertNotNull($user->instructorProfile);
    }

    /** @test */
    public function it_does_not_create_an_instructor_profile_when_created_user_was_an_student()
    {
        $this->post(route('administration.users.store', $this->handleUser('student')));

        $user = User::orderBy('id', 'desc')->first();

        $this->assertNull($user->instructorProfile);
    }

    /** @test */
    public function it_notify_the_user_who_has_created_by_the_administrator()
    {
        Notification::fake();

        $this->post(route('administration.users.store'), $this->handleUser());

        $user = User::orderBy('id', 'desc')->first();

        Notification::assertSentTo($user, YouWereCreated::class);
    }

    protected function handleUser($role = null)
    {
        return [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'role' => $role ?: 'student',
        ];
    }
}
