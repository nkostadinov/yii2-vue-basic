<?php
/** @var \yii\web\View $this */
$this->registerJs('var user = ' . \yii\helpers\Json::encode(Yii::$app->user->identity).';', \yii\web\View::POS_BEGIN);
$this->registerJs('var roles = ' . \yii\helpers\Json::encode(Yii::$app->authManager->getRoles()).';', \yii\web\View::POS_BEGIN);
$this->registerJs('var application_name = '. \yii\helpers\Json::encode(Yii::$app->name).';', \yii\web\View::POS_BEGIN);
?>
<div id="app">
</div>