<?php

use App\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateRolesTable.
 */
class CreateRolesTable extends AbstractMigration
{
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('roles');
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->schema()->create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->string('name', 100);
            $table->timestamps();
        });
    }
}
