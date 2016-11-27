<?php
namespace Emissions\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Emissions\Model\Table\MealsTable;

/**
 * Emissions\Model\Table\MealsTable Test Case
 */
class MealsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Emissions\Model\Table\MealsTable
     */
    public $Meals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.emissions.meals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Meals') ? [] : ['className' => 'Emissions\Model\Table\MealsTable'];
        $this->Meals = TableRegistry::get('Meals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Meals);

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
