<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Permission.
 */
class Permission extends Model
{
    /**
     * Delete users permission name.
     */
    const DELETE_USERS = 'delete users';

    /**
     * Manage users permission name.
     */
    const MANAGE_ROLES = 'manage roles';

    /**
     * Edit users permission name.
     */
    const EDIT_USERS = 'edit users';

    /**
     * Edit admins permission name.
     */
    const EDIT_ADMINS = 'edit admins';

    /**
     * View admin pages permission name.
     */
    const VIEW_ADMIN_PAGES = 'view admin pages';

    /**
     * Make admin permission name.
     */
    const MAKE_ADMIN = 'make admin';

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_permissions')->withTimestamps();
    }
}
