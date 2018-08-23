<?php

namespace app\migrations;

use Yii;
use yii\db\Migration;

/**
 * Class m180807_191538_Roles
 */
class m180807_191538_Roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->getTableSchema('user', true) === null) {
            throw new \yii\base\InvalidConfigException('Please migrate user and RBAC modules first');
        }

        $role = Yii::$app->authManager->createRole('Administrator');
        Yii::$app->authManager->add($role);
        Yii::$app->authManager->assign($role, 1);

        $role = Yii::$app->authManager->createRole('Owner');
        Yii::$app->authManager->add($role);
        $role = Yii::$app->authManager->createRole('Manager');
        Yii::$app->authManager->add($role);
        $role = Yii::$app->authManager->createRole('Receptionist');
        Yii::$app->authManager->add($role);
        $role = Yii::$app->authManager->createRole('Employee');
        Yii::$app->authManager->add($role);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->authManager->removeAllRoles();
    }
}
