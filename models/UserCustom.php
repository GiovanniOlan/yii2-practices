<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;

class UserCustom extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user_custom';
    }

    public function rules()
    {
        return [
            [['use_name', 'use_lastname', 'use_phone'], 'required'],
            [['use_fkuser', 'state'], 'integer'],
            [['use_name'], 'string', 'max' => 40],
            [['use_lastname'], 'string', 'max' => 60],
            [['use_phone'], 'string', 'max' => 15],
            [['use_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['use_fkuser' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'use_name' => 'Name',
            'use_lastname' => 'Last Name',
            'use_phone' => 'Phone',
            'use_fkuser' => 'User',
            'state' => 'State',
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['pro_fkusercustom' => 'id']);
    }

    public function getUsuFkuserweb()
    {
        return $this->hasOne(User::class, ['id' => 'usu_fkuserweb']);
    }
}
