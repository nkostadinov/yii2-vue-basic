<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 14.10.2018
 * Time: 22:32
 */

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class BaseActiveQuery extends ActiveQuery
{
    public function asDataProvider ($params = []) {
        return Yii::createObject(ArrayHelper::merge([
            'class' => ActiveDataProvider::class,
            'query' => $this,
        ], $params));
    }
}