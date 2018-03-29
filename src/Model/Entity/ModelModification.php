<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModelModification Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $vehicle_model_id
 * @property string $modification
 * @property string $engine
 * @property string $engine_model
 * @property string $engine_volume
 * @property string $power
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $deleted_at
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\VehicleModel $vehicle_model
 * @property \App\Model\Entity\Order[] $orders
 */
class ModelModification extends Entity
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
        'vehicle_model_id' => true,
        'modification' => true,
        'engine' => true,
        'engine_model' => true,
        'engine_volume' => true,
        'power' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted_at' => true,
        'vehicle' => true,
        'vehicle_model' => true,
        'orders' => true
    ];
}
