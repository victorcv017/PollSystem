<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property int $area_id
 * @property int $service_id
 *
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\Service $service
 */
class Employee extends Entity
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
        'last_name' => true,
        'phone' => true,
        'email' => true,
        'password' => true,
        'birthdate' => true,
        'area_id' => true,
        'service_id' => true,
        'area' => true,
        'service' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
