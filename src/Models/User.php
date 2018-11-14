<?php

namespace App\Models;

use Anddye\Interfaces\JwtSubjectInterface;
use App\Interfaces\HasPermissionInterface;
use App\Traits\HasPermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class User.
 */
class User extends Model implements HasPermissionInterface, JwtSubjectInterface
{
    use HasPermissionTrait;

    /**
     * @return int
     */
    public function getJwtIdentifier()
    {
        return $this->id;
    }

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'users_permissions')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles')->withTimestamps();
    }
}
