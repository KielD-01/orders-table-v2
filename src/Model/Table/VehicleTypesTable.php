<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VehicleTypes Model
 *
 * @property \App\Model\Table\VehiclesTable|\Cake\ORM\Association\HasMany $Vehicles
 *
 * @method \App\Model\Entity\VehicleType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VehicleType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VehicleType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VehicleType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VehicleType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleType findOrCreate($search, callable $callback = null, $options = [])
 */
class VehicleTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('vehicle_types');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Vehicles', [
            'foreignKey' => 'vehicle_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 80)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('image')
            ->maxLength('image', 80)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->dateTime('deleted_at')
            ->allowEmpty('deleted_at');

        return $validator;
    }
}
