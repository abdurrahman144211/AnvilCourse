<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    /**
     * Store a new user
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * Create a profile for an instructor
     * @param $profileData
     * @return mixed
     */
    public function createInstructorProfile($instructor, $profileData);
}
