<?php

namespace app\modules\api\controllers;

use app\models\Company;
use app\models\User;
use yii\rest\ActiveController;

/**
 * Default controller for the `Api` module
 */
class UserController extends ActiveController
{
    public $modelClass = User::class;
}
