<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskWorkLogTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskWorkLogTable Test Case
 */
class TaskWorkLogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskWorkLogTable
     */
    protected $TaskWorkLog;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TaskWorkLog',
        'app.Tasks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TaskWorkLog') ? [] : ['className' => TaskWorkLogTable::class];
        $this->TaskWorkLog = $this->getTableLocator()->get('TaskWorkLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TaskWorkLog);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
