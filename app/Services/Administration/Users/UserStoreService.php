<?php

namespace App\Services\Administration\Users;

use App\Events\Users\UserWasCreated;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\ServiceAbstract;

class UserStoreService extends ServiceAbstract
{
    protected $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
        $user = $this->users->store($data);

        if ($user->isInstructor() || $user->isAdministrator()) {
            $this->users->createInstructorProfile($user, [
                'job_title' => ucfirst($user->role)
            ]);
        }

        event(new UserWasCreated($user));

        return $user;
    }
}
