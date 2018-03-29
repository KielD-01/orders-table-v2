<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModelModificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModelModificationsTable Test Case
 */
class ModelModificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModelModificationsTable
     */
    public $ModelModifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.model_modifications',
        'app.vehicles',
        'app.vehicle_types',
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
        $config = TableRegistry::exists('ModelModifications') ? [] : ['className' => ModelModificationsTable::class];
        $this->ModelModifications = TableRegistry::get('ModelModifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModelModifications);

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
