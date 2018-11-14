<?php

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
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

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('users');
    }
}
