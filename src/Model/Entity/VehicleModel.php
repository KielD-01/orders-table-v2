<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VehicleModel Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $title
 * @property int $from_year
 * @property int $to_year
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\ModelModification[] $model_modifications
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\VehicleModelSuggestion[] $vehicle_model_suggestions
 */
class VehicleModel extends Entity
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
        'vehicle_id' => true,
        'title' => true,
        'from_year' => true,
        'to_year' => true,
        'image' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted_at' => true,
        'vehicle' => true,
        'model_modifications' => true,
        'orders' => true,
        'vehicle_model_suggestions' => true
    ];
}
