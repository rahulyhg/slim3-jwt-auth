<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role.
 */
class Role extends Model
{
    /**
     * Admin role name.
     */
    const ADMIN = 'admin';

    /**
     * Superadmin role name.
     */
    const SUPERADMIN = 'superadmin';

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions')->withTimestamps();
    }
}
