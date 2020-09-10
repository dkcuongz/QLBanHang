<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $price
 * @property string|null $description
 * @property string|null $img
 * @property int|null $quantity
 * @property int|null $qty_sold
 * @property int|null $detail
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $updated
 */
class Product extends Entity
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
        'id_cate' => true,
        'name' => true,
        'price' => true,
        'description' => true,
        'detail' => true,
        'img' => true,
        'quantity' => true,
        'qty_sold' => true,
        'created' => true,
        'updated' => true,
    ];
    public $belongsTo = array(
        'Prd_cate' => array(
            'className' => 'Category',
            'foreignKey' => 'cate_id'
        )
    );
}
