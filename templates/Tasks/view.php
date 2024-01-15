<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Work Log'), ['controller' => 'TaskWorkLog', 'action' => 'add', '?' => ['task_id' => $task->id]], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tasks view content">
            <h3><?= h($task->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $task->has('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($task->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($task->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completed') ?></th>
                    <td><?= $task->completed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($task->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Blockers') ?></h4>
                <?php if (!empty($task->predecessor_tasks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Completed') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($task->predecessor_tasks as $predecessorTasks) : ?>
                        <tr>
                            <td><?= h($predecessorTasks->modified) ?></td>
                            <td><?= h($this->Text->truncate($$predecessorTasks->name, 22)) ?></td>
                            <td><?= h($this->Text->truncate($predecessorTasks->description, 22)) ?></td>
                            <td><?= h($predecessorTasks->completed) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $predecessorTasks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $predecessorTasks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $predecessorTasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $predecessorTasks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Blocks') ?></h4>
                <?php if (!empty($task->successor_tasks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Completed') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($task->successor_tasks as $successorTasks) : ?>
                        <tr>
                            <td><?= h($successorTasks->modified) ?></td>
                            <td><?= h($this->Text->truncate($successorTasks->name, 22)) ?></td>
                            <td><?= h($this->Text->truncate($successorTasks->description, 22)) ?></td>
                            <td><?= h($successorTasks->completed) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $successorTasks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $successorTasks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $successorTasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $successorTasks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Work Log') ?></h4>
                <?php if (!empty($task->task_work_log)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Start') ?></th>
                            <th><?= __('End') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($task->task_work_log as $taskWorkLog) : ?>
                        <tr>
                            <td><?= h($taskWorkLog->modified) ?></td>
                            <td><?= h($this->Text->truncate($taskWorkLog->title, 22)) ?></td>
                            <td><?= h($this->Text->truncate($taskWorkLog->description, 22)) ?></td>
                            <td><?= h($taskWorkLog->start) ?></td>
                            <td><?= h($taskWorkLog->end) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TaskWorkLog', 'action' => 'view', $taskWorkLog->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TaskWorkLog', 'action' => 'edit', $taskWorkLog->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TaskWorkLog', 'action' => 'delete', $taskWorkLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskWorkLog->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
