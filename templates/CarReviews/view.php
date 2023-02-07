<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarReview $carReview
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Car Review'), ['action' => 'edit', $carReview->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Car Review'), ['action' => 'delete', $carReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carReview->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Car Reviews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Car Review'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carReviews view content">
            <h3><?= h($carReview->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $carReview->has('user') ? $this->Html->link($carReview->user->name, ['controller' => 'Users', 'action' => 'view', $carReview->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car') ?></th>
                    <td><?= $carReview->has('car') ? $this->Html->link($carReview->car->name, ['controller' => 'Cars', 'action' => 'view', $carReview->car->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= h($carReview->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Review') ?></th>
                    <td><?= h($carReview->review) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($carReview->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carReview->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($carReview->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified At') ?></th>
                    <td><?= h($carReview->modified_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
