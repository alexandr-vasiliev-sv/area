<?php

namespace app\models;

use app\components\UploadImageTrait;

/**
 * This is the model class for table "show".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 *
 * @property Event[] $events
 */
class Show extends BaseModel
{
    use UploadImageTrait;

    const IMAGE_FOLDER = 'uploads/shows';

    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'show';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'name'], 'required'],
            [['image'], 'required', 'on' => self::SCENARIO_CREATE],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['show_id' => 'id']);
    }
}
