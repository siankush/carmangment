<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CarReview> $carReviews
 */
?>
<div class="carReviews index content">
    <?= $this->Html->link(__('New Car Review'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Car Reviews') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('car_id') ?></th>
                    <th><?= $this->Paginator->sort('rating') ?></th>
                    <th><?= $this->Paginator->sort('review') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('modified_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carReviews as $carReview): ?>
                <tr>
                    <td><?= $this->Number->format($carReview->id) ?></td>
                    <td><?= $carReview->has('user') ? $this->Html->link($carReview->user->name, ['controller' => 'Users', 'action' => 'view', $carReview->user->id]) : '' ?></td>
                    <td><?= $carReview->has('car') ? $this->Html->link($carReview->car->name, ['controller' => 'Cars', 'action' => 'view', $carReview->car->id]) : '' ?></td>
                    <td><?= h($carReview->rating) ?></td>
                    <td><?= h($carReview->review) ?></td>
                    <td><?= h($carReview->status) ?></td>
                    <td><?= h($carReview->created_at) ?></td>
                    <td><?= h($carReview->modified_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $carReview->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carReview->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carReview->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
