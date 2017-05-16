<?php

namespace App\Observers;

use App\Models\AdminUser;

class AdminUserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param AdminUser $adminUser of hashpassword
     *
     * @return void
     */
    public function creating(AdminUser $adminUser)
    {
        $adminUser->password = bcrypt($adminUser->password);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param AdminUser $adminUser of hashpassword
     *
     * @return void
     */
    public function updating(AdminUser $adminUser)
    {
        if (\Hash::needsRehash($adminUser->password)) {
            $adminUser->password = bcrypt($adminUser->password);
        }
    }
}
