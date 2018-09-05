<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RespondentsPolls Model
 *
 * @property \App\Model\Table\PollsTable|\Cake\ORM\Association\BelongsTo $Polls
 * @property \App\Model\Table\RespondentsTable|\Cake\ORM\Association\BelongsTo $Respondents
 *
 * @method \App\Model\Entity\RespondentsPoll get($primaryKey, $options = [])
 * @method \App\Model\Entity\RespondentsPoll newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RespondentsPoll[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RespondentsPoll|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RespondentsPoll|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RespondentsPoll patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RespondentsPoll[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RespondentsPoll findOrCreate($search, callable $callback = null, $options = [])
 */
class RespondentsPollsTable extends Table
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

        $this->setTable('respondents_polls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Polls', [
            'foreignKey' => 'poll_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id',
            'joinType' => 'INNER'
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
            ->date('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

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
        $rules->add($rules->existsIn(['poll_id'], 'Polls'));
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));

        return $rules;
    }
}
