<?php

namespace App\Events;

use App\Models\AdminUser;

class HashPassword
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(AdminUser $adminUser)
    {
        $adminUser->password = bcrypt($adminUser->password);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function updating(AdminUser $adminUser)
    {
        $adminUser->password = bcrypt($adminUser->password);
    }
}