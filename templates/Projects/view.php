<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects view content">
            <h3><?= h($project->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($project->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($project->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($project->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Network') ?></strong>
                <div id="network" style="background-color:#eee"></div>
            </div>
            <div class="related">
                <h4><?= __('Related Tasks') ?></h4>
                <?php if (!empty($project->tasks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Completed') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->tasks as $tasks) : ?>
                        <tr>
                            <td><?= h($tasks->id) ?></td>
                            <td><?= h($tasks->created) ?></td>
                            <td><?= h($tasks->modified) ?></td>
                            <td><?= h($tasks->project_id) ?></td>
                            <td><?= h($tasks->name) ?></td>
                            <td><?= h($this->Text->truncate($tasks->description, 22)) ?></td>
                            <td><?= h($tasks->completed) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
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

<?= $this->Html->script('https://unpkg.com/vis-network@9.1.2/standalone/umd/vis-network.min.js', ['block' => 'script']); ?>
<?php $this->Html->scriptStart(['defer' => true]); ?>

(() => {

const project = <?= json_encode($project) ?>;

const container = document.getElementById('network');

const nodes = new vis.DataSet(
  project.tasks.map((t) => {
    return { id: t.id, label: t.name, title: t.description }
  })
);

const edges = new vis.DataSet(
  project.tasks.map((t) => t.predecessor_tasks).flat().map((t) => {
    return { from: t._joinData.predecessor_task_id, to: t._joinData.task_id }
  })
);

const data = {
  nodes: nodes,
  edges: edges
};

const options = {
  edges: {
    arrows: 'to'
  },
  nodes: {
    shape: 'box',
    shapeProperties: {
      borderRadius: 0
    },
    shadow: {
      enabled: true
    },
  },
  layout: {
    hierarchical: {
      direction: 'LR',
      sortMethod: 'directed'
    }
  },
  interaction: {
    dragNodes: false,
    selectable: false,
    selectConnectedEdges: false
  }
};

const network = new vis.Network(container, data, options);

network.on('click', (e) => {
  const node = network.getNodeAt(e.pointer.DOM);
  if (node)
    window.location = '/tasks/view/' + node;
})

})();

<?= $this->Html->scriptEnd(); ?>
