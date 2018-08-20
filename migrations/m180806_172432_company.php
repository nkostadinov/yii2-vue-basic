<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m180806_172432_company
 */
class m180806_172432_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->getTableSchema('user', true) === null) {
            throw new \yii\base\InvalidConfigException('Please migrate user and RBAC modules first');
        }

        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'location' => $this->string(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_CompanyCreated_User', 'company', 'created_by', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('company');
    }
}
