<?php

use Migrations\AbstractMigration;

class CreateModelModifications extends AbstractMigration
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
        $table = $this->table('model_modifications');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('vehicle_id', 'integer', ['null'=> false])
                ->addColumn('vehicle_model_id', 'integer', ['null'=> false])
                ->addColumn('modification', 'char', ['null'=>false])
                ->addColumn('engine', 'char', ['null'=> false])
                ->addColumn('engine_model', 'char', ['null'=> false])
                ->addColumn('engine_volume', 'char', ['null'=> false])
                ->addColumn('power', 'char', ['null'=> false])
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime', ['null' => true])
                ->create();
        }
    }

    public function down()
    {
        $table = $this->table('model_modifications');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
