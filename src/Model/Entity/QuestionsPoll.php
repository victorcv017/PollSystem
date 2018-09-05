<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionsPoll Entity
 *
 * @property int $id
 * @property int $question_id
 * @property int $poll_id
 *
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Poll $poll
 */
class QuestionsPoll extends Entity
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
        'question_id' => true,
        'poll_id' => true,
        'question' => true,
        'poll' => true
    ];
}
