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
        Permission::insert([
            [
                'name' => Permission::DELETE_USERS,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
            [
                'name' => Permission::EDIT_ADMINS,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
            [
                'name' => Permission::EDIT_USERS,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
            [
                'name' => Permission::MAKE_ADMIN,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
            [
                'name' => Permission::MANAGE_ROLES,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
            [
                'name' => Permission::VIEW_ADMIN_PAGES,
                'description' => '',
                'created_on' => '2018-10-01 14:01:15',
                'updated_on' => '2018-10-01 14:01:15',
            ],
        ]);
    }
}
