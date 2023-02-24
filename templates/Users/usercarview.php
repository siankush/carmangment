<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<div class="row">
    <aside class="column">
        <!-- <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Car'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div> -->
    </aside>
    <div class="column-responsive column-80">
        <div class="cars view content">
    <?= $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button float-right']) ?>

            <h3><?= h($car->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= $this->Html->image($car->image,['width'=> '200px']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($car->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= h($car->brand->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= h($car->model) ?></td>
                </tr>
                <tr>
                    <th><?= __('Make') ?></th>
                    <td><?= h($car->make) ?></td>
                </tr>
                <tr>
                    <th><?= __('Color') ?></th>
                    <td><?= h($car->color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($car->description) ?></td>
                </tr>
                <tr>
                <?= $this->Html->link(__('Rate'), ['controller'=>'Users','action' => 'ratingadd',$car->id], ['class' => 'button float-right']) ?>

                </tr>

            </table>
           <table> 
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
             
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('rating') ?></th>
                    <th><?= $this->Paginator->sort('review') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($sss as $carReview): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($carReview->id) ?></td> -->
                  
                  
                    <td><?= h($carReview->name) ?></td>
                    <td><?= h($carReview->rating) ?></td>
                    <td><?= h($carReview->review) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

            
                <!-- <div id="commentshow" class="ratings form content">
                        <?= $this->Form->create($revew) ?>
                        <fieldset>
                            <legend><?= __('Rate this car') ?></legend>
                           <?php echo $this->Form->select(
                             'field',
                             [1, 2, 3, 4, 5],
                             ['empty' => '(choose one)']
                         ); ?>
                            <?php
                            echo $this->Form->control('rating', ['type' => 'hidden', 'value' => '5', 'id' => 'starinput']);
                            echo $this->Form->control('review', ['type' => 'textarea']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <?php
                    $sum = 0;
                    $count = 0;
                    if (!empty($car->ratings)) : ?>
                        <h4><?= __('Related Ratings') ?></h4>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Rating') ?></th>
                                    <th><?= __('Review') ?></th>
                                    <!-- <th><?= __('Name') ?></th> -->
                                    <th><?= __('Created_at') ?></th>
                                </tr>
                            </table>
                        </div>
                        <?php $overallstar = $sum / $count; ?>
                    <?php endif; ?> --> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function() {

        $('#commenthide').click(function(e) {
            e.preventDefault();
            $(this).hide();
            $('#commentshow').show();
        });

        $('.star').click(function() {
            var stars = $(this).val()

            $(this).prevAll('li').removeClass('fa-regular');
            $(this).prevAll('li').addClass('fa-solid');
            $(this).removeClass('fa-regular');
            $(this).addClass('fa-solid');
            $(this).nextAll('li').removeClass('fa-solid');
            $(this).nextAll('li').addClass('fa-regular');

            $('#starinput').val(stars)
        })
    });
</script> -->

