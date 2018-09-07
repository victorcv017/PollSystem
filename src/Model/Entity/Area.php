<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity
 *
 * @property int $id
 * @property string $name
 * @property int $company_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Poll[] $polls
 * @property \App\Model\Entity\Service[] $services
 */
class Area extends Entity
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
        'company_id' => true,
        'company' => true,
        'employees' => true,
        'polls' => true,
        'services' => true
    ];
}
