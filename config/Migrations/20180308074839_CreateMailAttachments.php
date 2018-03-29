<?php
use Migrations\AbstractMigration;

class CreateMailAttachments extends AbstractMigration
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
        $table = $this->table('mail_attachments');
        $table->create();
    }
    public function down()
    {

        $table = $this->table('mail_attachments');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
