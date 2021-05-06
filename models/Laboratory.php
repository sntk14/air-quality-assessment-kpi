<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratories".
 *
 * @property int $id
 * @property string|null $city
 * @property string|null $street
 *
 * @property Indicators[] $indicators
 * @property QualityIndices[] $qualityIndices
 */
class Laboratory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'street'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Місто',
            'street' => 'Вулиця',
        ];
    }

    /**
     * Gets query for [[Indicators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicators()
    {
        return $this->hasMany(Indicator::className(), ['laboratory_id' => 'id']);
    }

    /**
     * Gets query for [[QualityIndices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQualityIndices()
    {
        return $this->hasMany(QualityIndex::className(), ['laboratory_id' => 'id']);
    }
}
