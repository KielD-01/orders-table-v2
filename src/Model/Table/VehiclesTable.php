<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \App\Model\Table\VehicleTypesTable|\Cake\ORM\Association\BelongsTo $VehicleTypes
 * @property \App\Model\Table\ModelModificationsTable|\Cake\ORM\Association\HasMany $ModelModifications
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\VehicleModelSuggestionsTable|\Cake\ORM\Association\HasMany $VehicleModelSuggestions
 * @property \App\Model\Table\VehicleModelsTable|\Cake\ORM\Association\HasMany $VehicleModels
 *
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, callable $callback = null, $options = [])
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('VehicleTypes', [
            'foreignKey' => 'vehicle_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ModelModifications', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('VehicleModelSuggestions', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->hasMany('VehicleModels', [
            'foreignKey' => 'vehicle_id'
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
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['vehicle_type_id'], 'VehicleTypes'));

        return $rules;
    }
}
