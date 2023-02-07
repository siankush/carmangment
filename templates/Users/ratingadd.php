<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarReview $carReview
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Car Reviews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carReviews form content">
            <?= $this->Form->create($carReview) ?>
            <fieldset>
                <legend><?= __('Add Car Review') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('car_id', ['options' => $cars]);
                    echo '<label>Rating</label>';
                    echo $this->Form->select(
                        'rating',
                        ['0'=>'0','1'=>'1','2'=>'2','3'=>'3']);
                    echo $this->Form->control('review',['required' => false, 'type'=>'textarea']);

                    // echo $this->Form->control('status');
                    // echo $this->Form->control('created_at');
                    // echo $this->Form->control('modified_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

