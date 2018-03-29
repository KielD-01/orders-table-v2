<?php
use Migrations\AbstractMigration;

class CreateAbuses extends AbstractMigration
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
        $table = $this->table('abuses');
        $table->create();
    }

    public function down()
    {

        $table = $this->table('abuses');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
