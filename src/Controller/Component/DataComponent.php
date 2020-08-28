<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Locator\LocatorAwareTrait;
use App\Model\Entity\Product;
use Cake\ORM\TableRegistry;

class DataComponent extends Component
{

    public function initialize(array $config): void {
        parent::initialize($config);
        $this->loadModel('Products');
    }

    public function getLst($model){
        $data = $this->Products->getTableLocator()->get($model);
        return $data->find('all');
    }

    public function getDetail($model, $id){
        $data =  $model->getTableLocator()->get($model);
        return $data->find()->where(['id' => $id])->first();
    }

    public function getLstRelated($model, $cate_id, $numb){
        $data =  $model->getTableLocator()->get($model);
        return $data->find()->where(['id_cate' => $cate_id])->limit($numb);
    }

    public function getNumb($model,$numb){
        $data =  $model->getTableLocator()->get($model);
        return $data->find()->limit($numb);
    }

    private function loadModel($model) {
        $this->$model = TableRegistry::get($model);
    }

    public function getTotal($cart){
        $total = 0;
        foreach ($cart->read('cart') as $key => $value) {
            $total += $value['price'] * $value['quantity'];
        }
        return $total;
    }
}
