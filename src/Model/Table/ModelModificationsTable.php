<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModelModifications Model
 *
 * @property \App\Model\Table\VehiclesTable|\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\VehicleModelsTable|\Cake\ORM\Association\BelongsTo $VehicleModels
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\ModelModification get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModelModification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModelModification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModelModification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModelModification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModelModification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModelModification findOrCreate($search, callable $callback = null, $options = [])
 */
class ModelModificationsTable extends Table
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

        $this->setTable('model_modifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VehicleModels', [
            'foreignKey' => 'vehicle_model_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'model_modification_id'
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
            ->scalar('modification')
            ->maxLength('modification', 255)
            ->requirePresence('modification', 'create')
            ->notEmpty('modification');

        $validator
            ->scalar('engine')
            ->maxLength('engine', 255)
            ->requirePresence('engine', 'create')
            ->notEmpty('engine');

        $validator
            ->scalar('engine_model')
            ->maxLength('engine_model', 255)
            ->requirePresence('engine_model', 'create')
            ->notEmpty('engine_model');

        $validator
            ->scalar('engine_volume')
            ->maxLength('engine_volume', 255)
            ->requirePresence('engine_volume', 'create')
            ->notEmpty('engine_volume');

        $validator
            ->scalar('power')
            ->maxLength('power', 255)
            ->requirePresence('power', 'create')
            ->notEmpty('power');

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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['vehicle_model_id'], 'VehicleModels'));

        return $rules;
    }
}
