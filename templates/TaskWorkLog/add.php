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
            <?= $this->Html->link(__('List Task Work Log'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="taskWorkLog form content">
            <?= $this->Form->create($taskWorkLog) ?>
            <fieldset>
                <legend><?= __('Add Task Work Log') ?></legend>
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
