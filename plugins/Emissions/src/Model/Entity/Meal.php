<?php
namespace Emissions\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meal Entity
 *
 * @property int $id
 * @property int $amount
 * @property bool $is_meat
 * @property bool $is_community
 * @property bool $is_outside
 * @property float $emission_factor
 * @property float $impact
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Meal extends Entity
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
        '*' => true,
        'id' => false
    ];
}
