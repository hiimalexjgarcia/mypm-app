<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TaskDependenciesFixture
 */
class TaskDependenciesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'predecessor_task_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'successor_task_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'predecessor_task_id' => ['type' => 'index', 'columns' => ['predecessor_task_id'], 'length' => []],
            'successor_task_id' => ['type' => 'index', 'columns' => ['successor_task_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'task_dependencies_ibfk_1' => ['type' => 'foreign', 'columns' => ['predecessor_task_id'], 'references' => ['tasks', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'task_dependencies_ibfk_2' => ['type' => 'foreign', 'columns' => ['successor_task_id'], 'references' => ['tasks', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'f38be489-53a3-4cee-bae4-5a7a2ff5e88c',
                'predecessor_task_id' => '304d382d-2402-485c-b116-0cda2c879e40',
                'successor_task_id' => '4e137a95-75d4-40f9-b7ab-9fc8165ac333',
            ],
            [
                'id' => '682b400d-9745-4f99-96dd-a53ac9ce2021',
                'predecessor_task_id' => '304d382d-2402-485c-b116-0cda2c879e40',
                'successor_task_id' => '0f958162-47e4-47c7-b528-f196dae908a3',
            ],
            [
                'id' => '35bff507-9533-49fb-9bb9-d1fae1b3bbc7',
                'predecessor_task_id' => '0f958162-47e4-47c7-b528-f196dae908a3',
                'successor_task_id' => '5beae9fc-6eaa-43ec-a6fa-f12543fcd0f4',
            ],
            [
                'id' => 'b74efd15-7978-4d3c-8442-430b4305215a',
                'predecessor_task_id' => '4e137a95-75d4-40f9-b7ab-9fc8165ac333',
                'successor_task_id' => '222cf946-430f-4416-a544-d2f35eab15dd',
            ],
            [
                'id' => 'c051c228-22e1-4ab0-8d12-4567f9fe6ba8',
                'predecessor_task_id' => '5beae9fc-6eaa-43ec-a6fa-f12543fcd0f4',
                'successor_task_id' => '222cf946-430f-4416-a544-d2f35eab15dd',
            ],
        ];
        parent::init();
    }
}
