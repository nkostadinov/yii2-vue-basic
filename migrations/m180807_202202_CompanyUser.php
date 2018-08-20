<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m180807_202202_CompanyUser
 */
class m180807_202202_CompanyUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\app\models\User::tableName(), 'company_id', $this->integer());

        $this->addForeignKey('fk_User_Company', 'user', 'company_id', 'company', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(\app\models\User::tableName(), 'company_id');
    }
}
