<?php

use Migrations\AbstractMigration;

class CreateVehicles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('vehicles');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('vehicle_type_id', 'integer', ['null' => false])
                ->addColumn('title', 'char', ['null' => false])
                ->addColumn('link', 'char', ['null' => false])
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime', ['null' => true])
                ->create();
        }
    }

    public function down()
    {

        $table = $this->table('vehicles');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
