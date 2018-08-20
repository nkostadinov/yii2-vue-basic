<?php

namespace app\modules\api\controllers;

use app\models\Company;
use yii\rest\ActiveController;

/**
 * Default controller for the `Api` module
 */
class CompanyController extends ActiveController
{
    public $modelClass = Company::class;
}
