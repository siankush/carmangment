<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarReview $carReview
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carReview->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carReview->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Car Reviews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carReviews form content">
            <?= $this->Form->create($carReview) ?>
            <fieldset>
                <legend><?= __('Edit Car Review') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('car_id', ['options' => $cars]);
                    echo $this->Form->control('rating');
                    echo $this->Form->control('review');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('modified_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
