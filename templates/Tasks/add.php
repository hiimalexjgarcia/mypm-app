<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 * @var \Cake\Collection\CollectionInterface|string[] $predecessorTasks
 * @var \Cake\Collection\CollectionInterface|string[] $successorTasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Add Task') ?></legend>
                <?php
                    echo $this->Form->label('Project');
                    echo $this->Form->select('project_id', $projects, ['value' => $project]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('completed');
                    echo $this->Form->control('predecessor_tasks._ids', [
                        'options' => $predecessorTasks,
                        'label' => 'Blockers',
                    ]);
                    echo $this->Form->control('successor_tasks._ids', [
                        'options' => $successorTasks,
                        'label' => 'Blocks',
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
