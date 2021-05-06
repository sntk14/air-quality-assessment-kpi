<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicator_types".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Coefficients[] $coefficients
 * @property Indicators[] $indicators
 */
class IndicatorType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
        ];
    }

    /**
     * Gets query for [[Coefficients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoefficients()
    {
        return $this->hasMany(Coefficient::className(), ['indicator_type_id' => 'id']);
    }

    /**
     * Gets query for [[Indicators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicators()
    {
        return $this->hasMany(Indicator::className(), ['indicator_type_id' => 'id']);
    }
}
