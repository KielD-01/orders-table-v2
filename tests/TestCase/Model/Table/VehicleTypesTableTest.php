<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicleTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicleTypesTable Test Case
 */
class VehicleTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicleTypesTable
     */
    public $VehicleTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicle_types',
        'app.vehicles',
        'app.model_modifications',
        'app.orders',
        'app.vehicle_model_suggestions',
        'app.vehicle_models'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VehicleTypes') ? [] : ['className' => VehicleTypesTable::class];
        $this->VehicleTypes = TableRegistry::get('VehicleTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VehicleTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
