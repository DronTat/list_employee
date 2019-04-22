<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'email:email',
            [
                    'attribute' => 'department_name',
                    'label' => 'Отдел',
                    'value' => 'department.name',
                    'filter' => Html::activeDropDownList($searchModel, 'department_id', \yii\helpers\ArrayHelper::map(\app\models\Department::find()->all(), 'id', 'name'), ['class'=>'form-control','prompt' => ''])
            ],
            [
                    'label' => 'Фото',
                    'format' => 'raw',
                    'value' => function($data){
                        return Html::img(\yii\helpers\Url::toRoute($data->foto), [
                                'style' => 'height: 70px;'
                        ]);
                    }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
