<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity
 *
 * @property int $id
 * @property int|null $id_order
 * @property int|null $id_product
 * @property int|null $price
 * @property int|null $quantity
 */
class OrderDetail extends Entity
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
        'id_order' => true,
        'id_product' => true,
        'price' => true,
        'quantity' => true,
    ];
    public $hasOne = array(
        'ordtail_Prd' => array(
            'className' => 'Product',
            'foreignKey' => 'id_product',
            'dependent' => false
        ),
    );
    public $belongsTo = array(
        'user_Ord' => array(
            'className' => 'User',
            'foreignKey' => 'id_user'
        )
    );
}
