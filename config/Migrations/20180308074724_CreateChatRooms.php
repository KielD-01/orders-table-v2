<?php
use Migrations\AbstractMigration;

class CreateChatRooms extends AbstractMigration
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
        $table = $this->table('chat_rooms');
        $table->create();
    }
    public function down()
    {

        $table = $this->table('chat_rooms');

        if ($table->exists()) {
            $table->drop();
        }
    }
}
