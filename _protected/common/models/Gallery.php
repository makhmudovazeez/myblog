<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $image
 * @property integer $size
 * @property integer $photo
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $photo;
    const size1 = 4;
    const size2 = 5;
    const size3 = 7;

    public function getSizes($index=null){
        $arr = [
            self::size1 => '4',
            self::size2 => '5',
            self::size3 => '7',
        ];

        if($index){
            return $arr[$index];
        }

        return $arr;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'size'], 'required'],
            [['size'], 'integer'],
            [['image'], 'string', 'max' => 255],
            ['photo', 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'size' => 'Size',
            'photo' => 'Photo',
        ];
    }
}
