<?php

namespace app\components;

use yii\web\UploadedFile;

trait UploadImageTrait
{
    protected $imageAttribute = 'image';

    /**
     * @param null|UploadedFile $image
     * $if $image !== null we update image
     * @return bool
     */
    public function saveAndUploadImage($image)
    {
        if ($image !== null) {
            $this->{$this->imageAttribute} = $this->generateImageName() . '.' . $image->extension; // generate new image name
            if (!$this->getIsNewRecord()) { // delete old picture
                $this->deleteImage($this->oldAttributes[$this->imageAttribute]);
            }
        } else {
            $this->{$this->imageAttribute} = $this->oldAttributes[$this->imageAttribute]; //save old image name
        }
        if ($this->save()) {
            if ($image !== null) {
                return $image->saveAs(self::IMAGE_FOLDER . '/' . $this->{$this->imageAttribute});
            }

            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function generateImageName()
    {
        return \Yii::$app->security->generateRandomString();
    }

    /**
     * @param null $imageName
     * @param null $default
     * @return null|string
     */
    public function fullImagePath($imageName = null, $default = null)
    {
        $image = $imageName ?? $this->{$this->imageAttribute};

        if ($image) {
            return self::IMAGE_FOLDER . '/' . $image;
        }

        return $default;
    }

    /**
     * @param null|string $image
     * @return bool
     */
    public function deleteImage($image = null)
    {
        $image = $this->fullImagePath($image);
        if (file_exists($image)) {
            return unlink($image);
        }
    }
}