<?php
/**
 * @author Nikola Kostadinov<nikolakk@gmail.com>
 * Date: 06.08.2018
 * Time: 17:15 ч.
 */

namespace app\models;

use Yii;

class User extends \nkostadinov\user\models\User
{
    const USER_ROLE_ADMIN = 'Administrator';
    const USER_ROLE_Owner = 'Owner';

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['password_hash']);
        unset($fields['auth_key']);
        $fields['role'] = 'role';
        $fields['company'] = 'company';

        return $fields;
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['company_id', 'role'], 'safe'];
        return $rules;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function getRole() {
        $roles = Yii::$app->authManager->getRolesByUser($this->id);
        if($roles) {
            $role = array_values($roles)[0];
            return $role->name;
        }
    }

    public function setRole($value) {
        $role = Yii::$app->authManager->getRole($this->role);
        if($role)
            Yii::$app->authManager->revoke($role, $this->id);

        $role = Yii::$app->authManager->getRole($value);
        Yii::$app->authManager->assign($role, $this->id);
    }
}