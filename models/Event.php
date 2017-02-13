<?php

namespace app\models;

use app\components\UploadImageTrait;
use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $date
 * @property integer $show_id
 * @property integer $area_id
 *
 * @property Area $area
 * @property Show $show
 */
class Event extends BaseModel
{
    use UploadImageTrait;

    const SCENARIO_CREATE = 'create';

    const IMAGE_FOLDER = 'uploads/events';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'show_id', 'area_id', 'title', 'description'], 'required'],
            [['image'], 'required', 'on' => self::SCENARIO_CREATE],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['show_id', 'area_id'], 'integer'],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['show_id'], 'exist', 'skipOnError' => true, 'targetClass' => Show::className(), 'targetAttribute' => ['show_id' => 'id']],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'show_id' => 'Show',
            'area_id' => 'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShow()
    {
        return $this->hasOne(Show::className(), ['id' => 'show_id']);
    }
}
