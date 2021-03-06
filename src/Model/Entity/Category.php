<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $parent
 */
class Category extends Entity
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
        'parent' => true,
    ];
    public $hasMany = array(
        'Children' => array(
            'className' => 'Category',
            'foreignKey' => 'parent',
            'dependent' => false
        ),
        'cate_Prd' => array(
            'className' => 'Product',
            'foreignKey' => 'id_cate',
            'dependent' => false
        ),
    );
    public $belongsTo = array(
        'Parent' => array(
            'className' => 'Category',
            'foreignKey' => 'parent'
        )
    );
}
