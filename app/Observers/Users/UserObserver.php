<?php

namespace App\Observers\Users;

class UserObserver
{
    /**
     * @param $user
     */
    public function creating($user)
    {
        $user->password = bcrypt($user->password);
    }
}
