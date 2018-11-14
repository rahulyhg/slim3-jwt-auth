<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Interface HasPermissionInterface.
 */
interface HasPermissionInterface
{
    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany;

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany;
}
