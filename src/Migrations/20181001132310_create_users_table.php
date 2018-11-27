<?php

use App\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends AbstractMigration
{
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('users');
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->text('password');
            $table->text('salt');
            $table->string('username', 32);
            $table->timestamps();
        });
    }
}
