<?php

use App\Migrations\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePermissionsTable.
 */
class CreatePermissionsTable extends AbstractMigration
{
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->schema()->drop('permissions');
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->schema()->create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->string('name', 100);
            $table->timestamps();
        });
    }
}
