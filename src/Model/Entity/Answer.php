<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property string $content
 * @property int $respondents_polls_id
 *
 * @property \App\Model\Entity\RespondentsPoll $respondents_poll
 * @property \App\Model\Entity\Question[] $questions
 */
class Answer extends Entity
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
        'content' => true,
        'respondents_polls_id' => true,
        'respondents_poll' => true,
        'questions' => true
    ];
}
