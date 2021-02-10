<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskWorkLog[]|\Cake\Collection\CollectionInterface $taskWorkLog
 */
?>
<div class="taskWorkLog index content">
    <?= $this->Html->link(__('New Task Work Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Task Work Log') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('start') ?></th>
                    <th><?= $this->Paginator->sort('end') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taskWorkLog as $taskWorkLog): ?>
                <tr>
                    <td><?= h($taskWorkLog->id) ?></td>
                    <td><?= h($taskWorkLog->created) ?></td>
                    <td><?= h($taskWorkLog->modified) ?></td>
                    <td><?= $taskWorkLog->has('task') ? $this->Html->link($taskWorkLog->task->name, ['controller' => 'Tasks', 'action' => 'view', $taskWorkLog->task->id]) : '' ?></td>
                    <td><?= h($taskWorkLog->title) ?></td>
                    <td><?= h($taskWorkLog->start) ?></td>
                    <td><?= h($taskWorkLog->end) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $taskWorkLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskWorkLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taskWorkLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskWorkLog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
