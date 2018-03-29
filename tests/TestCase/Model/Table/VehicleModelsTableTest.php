<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicleModelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicleModelsTable Test Case
 */
class VehicleModelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicleModelsTable
     */
    public $VehicleModels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicle_models',
        'app.vehicles',
        'app.vehicle_types',
        'app.model_modifications',
        'app.orders',
        'app.vehicle_model_suggestions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VehicleModels') ? [] : ['className' => VehicleModelsTable::class];
        $this->VehicleModels = TableRegistry::get('VehicleModels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VehicleModels);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
