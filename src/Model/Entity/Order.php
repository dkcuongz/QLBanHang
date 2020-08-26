<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int|null $id_user
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $total
 * @property int $state
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $updated
 */
class Order extends Entity
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
        'id_user' => true,
        'name' => true,
        'phone' => true,
        'address' => true,
        'total' => true,
        'state' => true,
        'created' => true,
        'updated' => true,
    ];
    public $hasMany = array(
        'ord_Ordertail' => array(
            'className' => 'OrderDetail',
            'foreignKey' => 'id_order',
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
