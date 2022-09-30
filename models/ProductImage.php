<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property int $id ID
 * @property string $proimg_url URL
 * @property int $proimg_fkproduct Product
 * @property string $created_date Create Date
 * @property string $update_date Update Date
 * @property string $delete_date Delete Date
 *
 * @property Product $proimgFkproduct
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proimg_url', 'proimg_fkproduct', 'created_date', 'update_date', 'delete_date'], 'required'],
            [['proimg_fkproduct'], 'integer'],
            [['created_date', 'update_date', 'delete_date'], 'safe'],
            [['proimg_url'], 'string', 'max' => 255],
            [['proimg_fkproduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['proimg_fkproduct' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proimg_url' => 'URL',
            'proimg_fkproduct' => 'Product',
            'created_date' => 'Create Date',
            'update_date' => 'Update Date',
            'delete_date' => 'Delete Date',
        ];
    }

    /**
     * Gets query for [[ProimgFkproduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProimgFkproduct()
    {
        return $this->hasOne(Product::class, ['id' => 'proimg_fkproduct']);
    }
}
