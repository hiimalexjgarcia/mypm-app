<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $project_id
 * @property string $name
 * @property string|null $description
 * @property bool|null $completed
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\TaskWorkLog[] $task_work_log
 * @property \App\Model\Entity\Task[] $predecessor_tasks
 * @property \App\Model\Entity\Task[] $successor_tasks
 */
class Task extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'project_id' => true,
        'name' => true,
        'description' => true,
        'completed' => true,
        'project' => true,
        'task_work_log' => true,
        'predecessor_tasks' => true,
        'successor_tasks' => true,
    ];
}
