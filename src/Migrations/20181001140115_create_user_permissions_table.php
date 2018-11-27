<?php

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUserPermissionsTable.
 */
class CreateUserPermissionsTable extends Migration
{
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('users_permissions');
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->schema()->create('users_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->timestamps();
        });
    }
}
