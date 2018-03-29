<?php

use Migrations\AbstractMigration;

class CreateVehicleTypes extends AbstractMigration
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
        $table = $this->table('vehicle_types');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('title', 'char', ['null' => false, 'length' => 80])
                ->addColumn('key', 'char', ['null' => false, 'length' => 80])
                ->addColumn('image', 'char', ['null' => false, 'length' => 80])
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime', ['null' => true])
                ->create();
        }
    }

    public function down()
    {
        $table = $this->table('vehicle_types');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
