<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicators".
 *
 * @property int $id
 * @property int|null $date
 * @property int|null $indicator_type_id
 * @property int|null $laboratory_id
 * @property float|null $value
 *
 * @property IndicatorTypes $indicatorType
 * @property Laboratories $laboratory
 */
class Indicator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'indicator_type_id', 'laboratory_id'], 'integer'],
            [['value'], 'number'],
            [['indicator_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndicatorType::className(), 'targetAttribute' => ['indicator_type_id' => 'id']],
            [['laboratory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Laboratory::className(), 'targetAttribute' => ['laboratory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Час',
            'indicator_type_id' => 'Тип показника',
            'laboratory_id' => 'Контрольний пункт',
            'value' => 'Значення показника',
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

    /**
     * Gets query for [[Laboratory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaboratory()
    {
        return $this->hasOne(Laboratory::className(), ['id' => 'laboratory_id']);
    }
}
