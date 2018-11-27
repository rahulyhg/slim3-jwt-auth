<?php

use App\Models\User;
use Phinx\Seed\AbstractSeed;

/**
 * Class UserSeed.
 */
class UserSeed extends AbstractSeed
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
        User::insert([
            [
                'password' => 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883',
                'salt' => '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr',
                'username' => 'admin',
                'created_on' => '2018-10-01 13:23:10',
                'updated_on' => '2018-10-01 13:23:10',
            ],
            [
                'password' => 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883',
                'salt' => '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr',
                'username' => 'janedoe',
                'created_on' => '2018-10-01 13:23:10',
                'updated_on' => '2018-10-01 13:23:10',
            ],
            [
                'password' => 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883',
                'salt' => '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr',
                'username' => 'johndoe',
                'created_on' => '2018-10-01 13:23:10',
                'updated_on' => '2018-10-01 13:23:10',
            ],
        ]);
    }
}
