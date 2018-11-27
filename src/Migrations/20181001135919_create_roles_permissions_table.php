<?php

use App\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateRolesPermissionsTable.
 */
class CreateRolesPermissionsTable extends AbstractMigration
{
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('roles_permissions');
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->schema()->create('roles_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->timestamps();
        });
    }
}
