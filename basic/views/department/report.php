<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Экспорт';
?>

<div class="report-index">

    <?= Html::dropDownList('list',null, ArrayHelper::map(\app\models\Department::find()->all(), 'id', 'name'), ['class'=>'form-control','prompt' => '']) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Экспортировать в PDF', ['class' => 'btn btn-success']) ?>
    </div>

</div>