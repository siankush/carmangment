<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reaction Entity
 *
 * @property int $id
 * @property string $user_id
 * @property string $car_id
 * @property string $upvote
 * @property string $downvote
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Car $car
 */
class Reaction extends Entity
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
        'upvote' => true,
        'downvote' => true,
        'user' => true,
        'car' => true,
    ];
}
