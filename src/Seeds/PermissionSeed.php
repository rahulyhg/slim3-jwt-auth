<?php

use App\Models\Permission;
use Phinx\Seed\AbstractSeed;

/**
 * Class PermissionSeed.
 */
class PermissionSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->seedPermission1()
            ->seedPermission2()
            ->seedPermission3()
            ->seedPermission4()
            ->seedPermission5()
            ->seedPermission6();
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission1(): self
    {
        $permission = new Permission();
        $permission->name = Permission::DELETE_USERS;
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission2(): self
    {
        $permission = new Permission();
        $permission->name = Permission::MANAGE_ROLES;
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission3(): self
    {
        $permission = new Permission();
        $permission->name = Permission::EDIT_USERS;
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission4(): self
    {
        $permission = new Permission();
        $permission->name = Permission::EDIT_ADMINS;
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission5(): self
    {
        $permission = new Permission();
        $permission->name = Permission::VIEW_ADMIN_PAGES;
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission6(): self
    {
        $permission = new Permission();
        $permission->name = Permission::MAKE_ADMIN;
        $permission->description = '';
        $permission->save();

        return $this;
    }
}
