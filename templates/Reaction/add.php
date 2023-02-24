<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reaction $reaction
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reaction'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reaction form content">
            <?= $this->Form->create($reaction) ?>
            <fieldset>
                <legend><?= __('Add Reaction') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('car_id', ['options' => $cars]);
                    echo $this->Form->control('upvote');
                    echo $this->Form->control('downvote');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
