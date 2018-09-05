<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Polls Model
 *
 * @property \App\Model\Table\AreasTable|\Cake\ORM\Association\BelongsTo $Areas
 * @property \App\Model\Table\SettingsTable|\Cake\ORM\Association\HasMany $Settings
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsToMany $Questions
 * @property \App\Model\Table\RespondentsTable|\Cake\ORM\Association\BelongsToMany $Respondents
 *
 * @method \App\Model\Entity\Poll get($primaryKey, $options = [])
 * @method \App\Model\Entity\Poll newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Poll[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Poll|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poll|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poll patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Poll[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Poll findOrCreate($search, callable $callback = null, $options = [])
 */
class PollsTable extends Table
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

        $this->setTable('polls');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Settings', [
            'foreignKey' => 'poll_id'
        ]);
        $this->belongsToMany('Questions', [
            'foreignKey' => 'poll_id',
            'targetForeignKey' => 'question_id',
            'joinTable' => 'questions_polls'
        ]);
        $this->belongsToMany('Respondents', [
            'foreignKey' => 'poll_id',
            'targetForeignKey' => 'respondent_id',
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
        $rules->add($rules->existsIn(['area_id'], 'Areas'));

        return $rules;
    }
}
