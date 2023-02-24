<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reaction $reaction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reaction'), ['action' => 'edit', $reaction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reaction'), ['action' => 'delete', $reaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reaction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reaction'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reaction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reaction view content">
            <h3><?= h($reaction->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reaction->has('user') ? $this->Html->link($reaction->user->name, ['controller' => 'Users', 'action' => 'view', $reaction->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car') ?></th>
                    <td><?= $reaction->has('car') ? $this->Html->link($reaction->car->name, ['controller' => 'Cars', 'action' => 'view', $reaction->car->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Upvote') ?></th>
                    <td><?= h($reaction->upvote) ?></td>
                </tr>
                <tr>
                    <th><?= __('Downvote') ?></th>
                    <td><?= h($reaction->downvote) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reaction->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
