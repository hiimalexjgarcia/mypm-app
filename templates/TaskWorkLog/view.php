<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskWorkLog $taskWorkLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Task Work Log'), ['action' => 'edit', $taskWorkLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Task Work Log'), ['action' => 'delete', $taskWorkLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskWorkLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Task Work Log'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Task Work Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="taskWorkLog view content">
            <h3><?= h($taskWorkLog->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $taskWorkLog->has('task') ? $this->Html->link($taskWorkLog->task->name, ['controller' => 'Tasks', 'action' => 'view', $taskWorkLog->task->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($taskWorkLog->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($taskWorkLog->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start') ?></th>
                    <td><?= h($taskWorkLog->start) ?></td>
                </tr>
                <tr>
                    <th><?= __('End') ?></th>
                    <td><?= h($taskWorkLog->end) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($taskWorkLog->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
