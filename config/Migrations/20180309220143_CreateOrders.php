<?php

use Migrations\AbstractMigration;

class CreateOrders extends AbstractMigration
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
        $table = $this->table('orders');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')
                ->addColumn('user_id', 'integer', ['null' => false])
                ->addColumn('client_id', 'integer', ['default' => null, 'null' => true])
                ->addColumn('vehicle_id', 'integer', ['null' => false])
                ->addColumn('vehicle_model_id', 'integer', ['null' => false])
                ->addColumn('model_modification_id', 'integer', ['null' => false])
                ->addColumn('spare_part', 'char', ['null' => false])
                ->addColumn('status', 'integer', ['default' => 1, 'null' => true])
                ->addColumn('active', 'boolean', ['default' => true, 'null' => true])
                ->addTimestamps()
                ->addColumn('deleted_at', 'datetime', ['null' => true])->create();
        }
    }

    public function down()
    {

        $table = $this->table('orders');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
