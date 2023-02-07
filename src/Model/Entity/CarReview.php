<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarReview Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property string $rating
 * @property string $review
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $modified_at
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Car $car
 */
class CarReview extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'car_id' => true,
        'rating' => true,
        'review' => true,
        // 'status' => true,
        'created_at' => true,
        'modified_at' => true,
        'user' => true,
        'car' => true,
        'name'=>true,
    ];
}
