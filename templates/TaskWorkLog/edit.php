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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $taskWorkLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $taskWorkLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Task Work Log'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="taskWorkLog form content">
            <?= $this->Form->create($taskWorkLog) ?>
            <fieldset>
                <legend><?= __('Edit Task Work Log') ?></legend>
                <?php
                    echo $this->Form->control('task_id', ['options' => $tasks]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('start', ['empty' => true]);
                    echo $this->Form->control('end', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
