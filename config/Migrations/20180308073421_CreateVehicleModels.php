<?php

use Migrations\AbstractMigration;

class CreateVehicleModels extends AbstractMigration
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
        $table = $this->table('vehicle_models');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('vehicle_id', 'integer', ['null' => false])
                ->addColumn('title', 'char', ['null' => false])
                ->addColumn('from_year', 'integer', ['length' => 4, 'null' => false])
                ->addColumn('to_year', 'integer', ['length' => 4, 'null' => false])
                ->addColumn('image', 'char', ['default' => ''])
                ->addColumn('url', 'char', ['null' => false])
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime', ['null' => true])
                ->create();
        }
    }

    public function down()
    {
        $table = $this->table('vehicle_models');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
