<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTaskDependenciesTableAttributeSuccessorTaskIdToTaskId extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('task_dependencies')
            ->dropForeignKey([], 'task_dependencies_ibfk_2')
            ->removeIndexByName('successor_task_id')
            ->update();

        $this->table('task_dependencies')
            ->removeColumn('successor_task_id')
            ->update();

        $this->table('task_dependencies')
            ->addColumn('task_id', 'uuid', [
                'after' => 'predecessor_task_id',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'task_id',
                ],
                [
                    'name' => 'successor_task_id',
                ]
            )
            ->update();

        $this->table('task_dependencies')
            ->addForeignKey(
                'task_id',
                'tasks',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('task_dependencies')
            ->dropForeignKey(
                'task_id'
            )->save();

        $this->table('task_dependencies')
            ->removeIndexByName('successor_task_id')
            ->update();

        $this->table('task_dependencies')
            ->addColumn('successor_task_id', 'uuid', [
                'after' => 'predecessor_task_id',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('task_id')
            ->addIndex(
                [
                    'successor_task_id',
                ],
                [
                    'name' => 'successor_task_id',
                ]
            )
            ->update();

        $this->table('task_dependencies')
            ->addForeignKey(
                'successor_task_id',
                'tasks',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }
}
