<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Poll Entity
 *
 * @property int $id
 * @property string $name
 * @property int $area_id
 * @property \Cake\I18n\FrozenDate $created_at
 *
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Respondent[] $respondents
 */
class Poll extends Entity
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
        'name' => true,
        'area_id' => true,
        'created_at' => true,
        'area' => true,
        'settings' => true,
        'questions' => true,
        'respondents' => true
    ];
}
