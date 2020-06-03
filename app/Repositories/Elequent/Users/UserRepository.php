<?php

namespace App\Repositories\Elequent\Users;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    protected $users;

    /**
     * UserRepository constructor.
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->users->create($data);
    }

    /**
     * @param $user
     * @param $profileData
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createInstructorProfile($user, $profileData)
    {
        return $user->instructorProfile()->create($profileData);
    }
}
