<?php

namespace Tests\Support\Factories;

use App\Models\User;

class UserFactory
{
    protected $hasInstructorProfile = false;
    protected $instructorProfileData = [];

    public function withInstructorProfile($data = [])
    {
        $this->hasInstructorProfile = true;
        $this->instructorProfileData = [];

        return $this;
    }

    public function create($data = [])
    {
        $user =  factory(User::class)->create($data);

        if ($this->hasInstructorProfile) {
            $user->update(['role' => 'instructor']);
            $user->instructorProfile()->create($this->instructorProfileData);
        }

        return $user;
    }
}
