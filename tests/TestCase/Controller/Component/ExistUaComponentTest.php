<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ExistUaComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ExistUaComponent Test Case
 */
class ExistUaComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\ExistUaComponent
     */
    public $ExistUa;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->ExistUa = new ExistUaComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExistUa);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
