<?php
namespace Bill\Test\TestCase\Model\Behavior;

use Bill\Model\Behavior\ResizeAndAnalyseBehavior;
use Cake\TestSuite\TestCase;

/**
 * Bill\Model\Behavior\ResizeAndAnalyseBehavior Test Case
 */
class ResizeAndAnalyseBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Bill\Model\Behavior\ResizeAndAnalyseBehavior
     */
    public $ResizeAndAnalyse;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ResizeAndAnalyse = new ResizeAndAnalyseBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResizeAndAnalyse);

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
