<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VehicleModels Model
 *
 * @property \App\Model\Table\VehiclesTable|\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\ModelModificationsTable|\Cake\ORM\Association\HasMany $ModelModifications
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\VehicleModelSuggestionsTable|\Cake\ORM\Association\HasMany $VehicleModelSuggestions
 *
 * @method \App\Model\Entity\VehicleModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\VehicleModel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VehicleModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VehicleModel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VehicleModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleModel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VehicleModel findOrCreate($search, callable $callback = null, $options = [])
 */
class VehicleModelsTable extends Table
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

        $this->setTable('vehicle_models');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ModelModifications', [
            'foreignKey' => 'vehicle_model_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'vehicle_model_id'
        ]);
        $this->hasMany('VehicleModelSuggestions', [
            'foreignKey' => 'vehicle_model_id'
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
            ->integer('from_year')
            ->requirePresence('from_year', 'create')
            ->notEmpty('from_year');

        $validator
            ->integer('to_year')
            ->requirePresence('to_year', 'create')
            ->notEmpty('to_year');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
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

        return $rules;
    }
}
