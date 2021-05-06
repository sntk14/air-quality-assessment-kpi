<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coefficients".
 *
 * @property int $id
 * @property int|null $indicator_type_id
 * @property float|null $value
 *
 * @property IndicatorTypes $indicatorType
 */
class Coefficient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coefficients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicator_type_id'], 'integer'],
            [['value'], 'number'],
            [['indicator_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndicatorType::className(), 'targetAttribute' => ['indicator_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'indicator_type_id' => 'Тип показника',
            'value' => 'Значення коефіцієнта',
        ];
    }

    /**
     * Gets query for [[IndicatorType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorType()
    {
        return $this->hasOne(IndicatorType::className(), ['id' => 'indicator_type_id']);
    }
}
