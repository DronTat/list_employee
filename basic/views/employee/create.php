<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employees */
/* @var $file app\models\UploadImageForm */

$this->title = 'Добавить сотрудника';
//$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'file' => $file
    ]) ?>

</div>
