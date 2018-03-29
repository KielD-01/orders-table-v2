<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property int $vehicle_type_id
 * @property string $title
 * @property string $link
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\VehicleType $vehicle_type
 * @property \App\Model\Entity\ModelModification[] $model_modifications
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\VehicleModelSuggestion[] $vehicle_model_suggestions
 * @property \App\Model\Entity\VehicleModel[] $vehicle_models
 */
class Vehicle extends Entity
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
        'vehicle_type_id' => true,
        'title' => true,
        'link' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted_at' => true,
        'vehicle_type' => true,
        'model_modifications' => true,
        'orders' => true,
        'vehicle_model_suggestions' => true,
        'vehicle_models' => true
    ];
}
