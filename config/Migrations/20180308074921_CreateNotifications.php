<?php
use Migrations\AbstractMigration;

class CreateNotifications extends AbstractMigration
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
        $table = $this->table('notifications');
        $table->create();
    }

    public function down()
    {

        $table = $this->table('notifications');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
