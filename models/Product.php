<?php

namespace app\models;

use Yii;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['pro_name', 'pro_description', 'pro_price', 'state', 'create_date', 'update_date', 'delete_date', 'pro_fkusercustom'], 'required'],
            [['pro_description'], 'string'],
            [['pro_price'], 'number'],
            [['state', 'pro_fkusercustom'], 'integer'],
            [['create_date', 'update_date', 'delete_date'], 'safe'],
            [['pro_name'], 'string', 'max' => 50],
            [['pro_fkusercustom'], 'exist', 'skipOnError' => true, 'targetClass' => UserCustom::class, 'targetAttribute' => ['pro_fkusercustom' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pro_name' => 'Name',
            'pro_description' => 'Description',
            'pro_price' => 'Price',
            'state' => 'State',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'delete_date' => 'Delete Date',
            'pro_fkusercustom' => 'User Custom',
        ];
    }

    public function getProFkusercustom()
    {
        return $this->hasOne(UserCustom::class, ['id' => 'pro_fkusercustom']);
    }

    public function getProductImages()
    {
        return $this->hasMany(ProductImage::class, ['proimg_fkproduct' => 'id']);
    }
}
