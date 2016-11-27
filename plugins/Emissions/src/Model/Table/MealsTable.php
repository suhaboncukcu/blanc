<?php
namespace Emissions\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 *
 * @method \Emissions\Model\Entity\Meal get($primaryKey, $options = [])
 * @method \Emissions\Model\Entity\Meal newEntity($data = null, array $options = [])
 * @method \Emissions\Model\Entity\Meal[] newEntities(array $data, array $options = [])
 * @method \Emissions\Model\Entity\Meal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Emissions\Model\Entity\Meal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Emissions\Model\Entity\Meal[] patchEntities($entities, array $data, array $options = [])
 * @method \Emissions\Model\Entity\Meal findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MealsTable extends Table
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

        $this->table('meals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Emissions.MealCalculations');
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
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->boolean('is_meat')
            ->requirePresence('is_meat', 'create')
            ->notEmpty('is_meat');

        $validator
            ->boolean('is_community')
            ->requirePresence('is_community', 'create')
            ->notEmpty('is_community');

        $validator
            ->boolean('is_outside')
            ->requirePresence('is_outside', 'create')
            ->notEmpty('is_outside');

        $validator
            ->numeric('emission_factor')
            ->allowEmpty('emission_factor');

        $validator
            ->numeric('impact')
            ->allowEmpty('impact');

        return $validator;
    }
}
