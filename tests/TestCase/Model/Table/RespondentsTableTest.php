<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RespondentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RespondentsTable Test Case
 */
class RespondentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RespondentsTable
     */
    public $Respondents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.respondents',
        'app.polls'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Respondents') ? [] : ['className' => RespondentsTable::class];
        $this->Respondents = TableRegistry::getTableLocator()->get('Respondents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Respondents);

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
