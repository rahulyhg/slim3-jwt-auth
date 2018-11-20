<?php

namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\MySqlBuilder as Schema;
use Phinx\Migration\AbstractMigration as Migration;

/**
 * Class AbstractMigration.
 */
class AbstractMigration extends Migration
{
    /**
     * @var Schema
     */
    private $schema;

    /**
     * Create a schema builder instance.
     */
    public function init(): void
    {
        $this->schema = (new Capsule())->schema();
    }

    /**
     * Get the schema builder instance.
     *
     * @return Schema
     */
    public function schema(): Schema
    {
        return $this->schema;
    }
}
