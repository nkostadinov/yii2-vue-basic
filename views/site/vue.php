<?php
/** @var \yii\web\View $this */
$this->registerJs('var user = ' . \yii\helpers\Json::encode(Yii::$app->user->identity).';', \yii\web\View::POS_BEGIN);
$this->registerJs('var roles = ' . \yii\helpers\Json::encode(Yii::$app->authManager->getRoles()).';', \yii\web\View::POS_BEGIN);
$this->registerJs('var companies = ' . \yii\helpers\Json::encode(\app\models\Company::find()->all()).';', \yii\web\View::POS_BEGIN);
?>
<div id="app">
</div>