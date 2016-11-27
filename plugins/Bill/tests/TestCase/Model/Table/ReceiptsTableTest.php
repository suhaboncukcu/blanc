<?php
namespace Bill\Test\TestCase\Model\Table;

use Bill\Model\Table\ReceiptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Bill\Model\Table\ReceiptsTable Test Case
 */
class ReceiptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Bill\Model\Table\ReceiptsTable
     */
    public $Receipts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.bill.receipts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Receipts') ? [] : ['className' => 'Bill\Model\Table\ReceiptsTable'];
        $this->Receipts = TableRegistry::get('Receipts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Receipts);

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
