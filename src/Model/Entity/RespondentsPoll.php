<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RespondentsPoll Entity
 *
 * @property int $id
 * @property int $poll_id
 * @property int $respondent_id
 * @property \Cake\I18n\FrozenDate $created_at
 *
 * @property \App\Model\Entity\Poll $poll
 * @property \App\Model\Entity\Respondent $respondent
 */
class RespondentsPoll extends Entity
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
        'poll_id' => true,
        'respondent_id' => true,
        'created_at' => true,
        'poll' => true,
        'respondent' => true
    ];
}
