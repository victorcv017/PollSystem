<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respondents Model
 *
 * @property \App\Model\Table\PollsTable|\Cake\ORM\Association\BelongsToMany $Polls
 *
 * @method \App\Model\Entity\Respondent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Respondent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Respondent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Respondent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respondent|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respondent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Respondent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Respondent findOrCreate($search, callable $callback = null, $options = [])
 */
class RespondentsTable extends Table
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

        $this->setTable('respondents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Polls', [
            'foreignKey' => 'respondent_id',
            'targetForeignKey' => 'poll_id',
            'joinTable' => 'respondents_polls'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
