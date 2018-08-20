<?php
/**
 * @author Nikola Kostadinov<nikolakk@gmail.com>
 * Date: 07.08.2018
 * Time: 21:51 ч.
 */

namespace app\modules\api\controllers;


use Yii;
use yii\data\ArrayDataProvider;
use yii\rest\Controller;

class RbacController extends Controller
{
    public function getRbac() {
        return Yii::$app->authManager;
    }

    public function actionIndex() {
        return new ArrayDataProvider([
            'allModels' => $this->rbac->getPrintableRolesTree(),
            'key' => 'name',
        ]);
    }
}