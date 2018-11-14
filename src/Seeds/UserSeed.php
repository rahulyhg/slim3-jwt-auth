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
        $this->seedUser1()
            ->seedUser2()
            ->seedUser3();
    }

    /**
     * @return UserSeed
     */
    private function seedUser1(): self
    {
        $user = new User();
        $user->password = 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883';
        $user->salt = '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr';
        $user->username = 'admin';
        $user->save();

        return $this;
    }

    /**
     * @return UserSeed
     */
    private function seedUser2(): self
    {
        $user = new User();
        $user->password = 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883';
        $user->salt = '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr';
        $user->username = 'janedoe';
        $user->save();

        return $this;
    }

    /**
     * @return UserSeed
     */
    private function seedUser3(): self
    {
        $user = new User();
        $user->password = 'ea2959d87ea2974afcd45c6224d2e5322bc349db8e65f8a3c7460e2a8fb9a883';
        $user->salt = '>TrKAx^/<E^+aX!-5K|}pL!Po9(gH_Fr';
        $user->username = 'johndoe';
        $user->save();

        return $this;
    }
}
