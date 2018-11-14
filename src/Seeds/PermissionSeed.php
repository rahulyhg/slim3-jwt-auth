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
    private function seedPermission1()
    {
        $permission = new Permission();
        $permission->name = 'delete users';
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission2()
    {
        $permission = new Permission();
        $permission->name = 'manage roles';
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission3()
    {
        $permission = new Permission();
        $permission->name = 'edit users';
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission4()
    {
        $permission = new Permission();
        $permission->name = 'edit admins';
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission5()
    {
        $permission = new Permission();
        $permission->name = 'view admin pages';
        $permission->description = '';
        $permission->save();

        return $this;
    }

    /**
     * @return PermissionSeed
     */
    private function seedPermission6()
    {
        $permission = new Permission();
        $permission->name = 'make admin';
        $permission->description = '';
        $permission->save();

        return $this;
    }
}
