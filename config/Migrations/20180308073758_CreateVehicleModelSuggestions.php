<?php

use Migrations\AbstractMigration;

class CreateVehicleModelSuggestions extends AbstractMigration
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
        $table = $this->table('vehicle_model_suggestions');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('vehicle_id', 'integer', ['null' => false])
                ->addColumn('vehicle_model_id', 'integer', ['null' => false])
                ->addColumn('suggestion', 'text')
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime')
                ->create();
        }
    }

    public function down()
    {
        $table = $this->table('vehicle_model_suggestions');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
