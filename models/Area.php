<?php

namespace app\models;

use app\components\UploadImageTrait;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property integer $order
 *
 * @property Event[] $events
 */
class Area extends BaseModel
{
    use UploadImageTrait;

    const IMAGE_FOLDER = 'uploads/areas';

    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'order'], 'required'],
            [['image'], 'required', 'on' => self::SCENARIO_CREATE],
            [['description'], 'string'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name', 'order'], 'unique'],
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
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'order' => 'Order',
        ];
    }

    public function setNextOrder()
    {
        $order = static::find()->select('max(`order`) as `order`')->one();
        $this->order = $order->order + 1 ?? 1;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['area_id' => 'id']);
    }
}
