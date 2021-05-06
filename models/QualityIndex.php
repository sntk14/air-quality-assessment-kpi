<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quality_indices".
 *
 * @property int $id
 * @property int|null $date
 * @property int|null $laboratory_id
 * @property float|null $value
 *
 * @property Laboratory $laboratory
 */
class QualityIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quality_indices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'laboratory_id'], 'integer'],
            [['value'], 'number'],
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
            'date' => 'Дата та час',
            'laboratory_id' => 'Контрольний пункт',
            'value' => 'Оцінка якості повітря',
        ];
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
