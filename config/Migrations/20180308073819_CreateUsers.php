<?php

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');

        if (!$table->exists()) {
            $table
                ->addPrimaryKey('id')

                ->create();
        }
    }

    public function down()
    {
        $table = $this->table('users');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
