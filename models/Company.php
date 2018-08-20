<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $name
 * @property int $created_by
 * @property string $created_at
 */
class Company extends \yii\db\ActiveRecord
{
    public function fields()
    {
        $fields = parent::fields();
        $fields['id'] = function ($model) { return intval($model->id); };
        $fields['user_count'] = 'UsersCount';
        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'integer'],
            [['name'], 'required'],
            [['name'], 'unique'],
//            [['created_by'], 'required'],
//            [['created_at'], 'safe'],
            [['location'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['company_id' => 'id']);
    }

    public function getUsersCount()
    {
        return intval($this->getUsers()->count());
    }
}
