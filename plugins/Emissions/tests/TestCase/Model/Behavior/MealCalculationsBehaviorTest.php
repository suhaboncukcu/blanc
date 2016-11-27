<?php
namespace Emissions\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Emissions\Model\Behavior\MealCalculationsBehavior;

/**
 * Emissions\Model\Behavior\MealCalculationsBehavior Test Case
 */
class MealCalculationsBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Emissions\Model\Behavior\MealCalculationsBehavior
     */
    public $MealCalculations;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->MealCalculations = new MealCalculationsBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealCalculations);

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
