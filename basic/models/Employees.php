<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $department_id
 * @property string $foto
 *
 * @property Department $department
 */
class Employees extends \yii\db\ActiveRecord
{
//    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['foto'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'email' => 'Почта',
            'department_id' => 'Отдел',
            'foto' => 'Фото',
        ];
    }

    public function setFoto($url)
    {
        $this->foto = $url;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
