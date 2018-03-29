<?php

use Migrations\AbstractSeed;

/**
 * Class VehicleTypesSeed
 */
class VehicleTypesSeed extends AbstractSeed
{

    private $_types = [
        'cars', 'trucks',
        'commercial', 'moto'
    ];

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = \Cake\ORM\TableRegistry::get('vehicle_types');

        foreach ($this->_types as $type) {
            $table
                ->findOrCreate(['title' => ucfirst($type), 'key' => $type, 'image' => "/img/v_types/{$type}.png"]);
        }
    }
}
