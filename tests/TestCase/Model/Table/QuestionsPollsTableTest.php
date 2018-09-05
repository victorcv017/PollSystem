<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionsPollsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsPollsTable Test Case
 */
class QuestionsPollsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionsPollsTable
     */
    public $QuestionsPolls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions_polls',
        'app.questions',
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
        $config = TableRegistry::getTableLocator()->exists('QuestionsPolls') ? [] : ['className' => QuestionsPollsTable::class];
        $this->QuestionsPolls = TableRegistry::getTableLocator()->get('QuestionsPolls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionsPolls);

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
