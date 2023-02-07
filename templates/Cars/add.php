<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $brands
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cars form content">
            <?= $this->Form->create($car,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Car') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('brand_id', ['options' => $brands]);
                    echo $this->Form->control('model');
                    echo $this->Form->control('make');
                    echo "<label>Color</label>";
                    echo $this->Form->select(
                        'color',
                        ['black'=>'black','white'=>'white','grey'=>'grey'],
                        ['empty' => '(choose one)']
                    );
                    echo "<label>Description</label>";
                    echo $this->Form->textarea('description');
                    echo $this->Form->control('image',['type'=> 'file']);
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
