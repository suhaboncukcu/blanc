<?php
namespace Bill\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Receipts Model
 *
 * @method \Bill\Model\Entity\Receipt get($primaryKey, $options = [])
 * @method \Bill\Model\Entity\Receipt newEntity($data = null, array $options = [])
 * @method \Bill\Model\Entity\Receipt[] newEntities(array $data, array $options = [])
 * @method \Bill\Model\Entity\Receipt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Bill\Model\Entity\Receipt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Bill\Model\Entity\Receipt[] patchEntities($entities, array $data, array $options = [])
 * @method \Bill\Model\Entity\Receipt findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReceiptsTable extends Table
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

        $this->table('receipts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Bill.ResizeAndAnalyse');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'file' => [
                        'path' => 'upload/receipts/:id/:md5'
                    ]
                ]
            ]
        );
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
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');


        return $validator;
    }
}
