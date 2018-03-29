<?php
use Migrations\AbstractMigration;

class CreateUserReports extends AbstractMigration
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
        $table = $this->table('user_reports');
        $table->create();
    }

    public function down()
    {

        $table = $this->table('user_reports');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
