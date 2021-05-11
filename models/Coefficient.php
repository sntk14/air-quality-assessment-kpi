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
            [['indicator_type_id', 'level'], 'integer'],
            [['min', 'max'], 'number'],
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
            'min' => 'Мінімальне значення рівня',
            'max' => 'Максимальне значення рівня',
            'level' => 'Рівень',
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


    //Queries

    public function getMaxCoefficients()
    {
        $indxs = (new \yii\db\Query())
            ->select(['max(id) as max'])
            ->from('coefficients')
            ->groupBy('indicator_type_id')
            ->all();

        return $this->find()
            ->select(['indicator_type_id', 'max', 'id'])
            ->where(['in', 'id', array_map(function ($item) {
                return $item['max'];
            }, $indxs)])
            ->all();
    }

    public function getMinCoefficients()
    {
        return $this->find()
            ->select(['id', 'min', 'indicator_type_id'])
            ->from('coefficients')
            ->groupBy('indicator_type_id')
            ->all();
    }
}
