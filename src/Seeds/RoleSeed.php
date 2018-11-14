<?php

use App\Models\Role;
use Phinx\Seed\AbstractSeed;

/**
 * Class RoleSeed.
 */
class RoleSeed extends AbstractSeed
{
    /**
     * Return seeds dependencies.
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'PermissionSeed',
        ];
    }

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
        $this->seedRole1()
            ->seedRole2();
    }

    /**
     * @return RoleSeed
     */
    private function seedRole1(): self
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = '';
        $role->save();

        $role->permissions()->attach([1, 3, 5]);

        return $this;
    }

    /**
     * @return RoleSeed
     */
    private function seedRole2(): self
    {
        $role = new Role();
        $role->name = 'superadmin';
        $role->description = '';
        $role->save();

        $role->permissions()->attach([1, 2, 3, 4, 5, 6]);

        return $this;
    }
}
