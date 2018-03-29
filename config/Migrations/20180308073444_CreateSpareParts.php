<?php
use Migrations\AbstractMigration;

class CreateSpareParts extends AbstractMigration
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
        $table = $this->table('spare_parts');

        if (!$table->exists()){
           $table
           ->addPrimaryKey('id')
           ->addColumn('part', 'text')
           ->addTimestamps()
           ->addColumn('deleted_at', 'datetime')
           ->create();
        }
    }

    public function down()
    {
        $table = $this->table('spare_parts');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
