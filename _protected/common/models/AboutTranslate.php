<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about_translate".
 *
 * @property integer $id
 * @property string $information
 * @property integer $about_id
 * @property integer $lang_id
 *
 * @property About $about
 * @property Lang $lang
 */
class AboutTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['information', 'about_id', 'lang_id'], 'required'],
            [['about_id', 'lang_id'], 'integer'],
            [['information'], 'string', 'max' => 21500],
            [['about_id'], 'exist', 'skipOnError' => true, 'targetClass' => About::className(), 'targetAttribute' => ['about_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'information' => 'Information',
            'about_id' => 'About ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbout()
    {
        return $this->hasOne(About::className(), ['id' => 'about_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
