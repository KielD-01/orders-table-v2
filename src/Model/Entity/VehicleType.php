<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VehicleType Entity
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class VehicleType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'image' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted_at' => true,
        'vehicles' => true
    ];
}
