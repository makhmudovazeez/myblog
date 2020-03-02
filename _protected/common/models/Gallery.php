<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $image
 * @property integer $size
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $photo;
    const size1 = 1;
    const size2 = 2;
    const size3 = 3;
    const size4 = 4;

    public function getSizes($index=null){
        $arr = [
            self::size1 => '3',
            self::size2 => '4',
            self::size3 => '6',
            self::size4 => '7',
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
