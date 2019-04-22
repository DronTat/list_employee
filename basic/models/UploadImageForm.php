<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.04.2019
 * Time: 11:26
 */

namespace app\models;

use Yii;
use yii\base\Model;

class UploadImageForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($array)
    {
        if ($this->validate()) {
            $name = md5($array['name']);
            $this->imageFile->saveAs(Yii::getAlias('@webroot').'/uploads/' . $name . '.' . $this->imageFile->extension);
            $urlFoto = '/uploads/' . $name . '.' . $this->imageFile->extension;
            return $urlFoto;
        } else {
            return false;
        }
    }
}