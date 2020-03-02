<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $image
 * @property string $message
 *
 * @property NewsInformation[] $newsInformations
 * @property NewsTranslate[] $newsTranslates
 */
class News extends \yii\db\ActiveRecord
{
    public $photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'message'], 'required'],
            [['image', 'message'], 'string', 'max' => 255],
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
            'message' => 'Message',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsInformations()
    {
        return $this->hasMany(NewsInformation::className(), ['news_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsTranslates()
    {
        return $this->hasMany(NewsTranslate::className(), ['news_id' => 'id']);
    }
}
