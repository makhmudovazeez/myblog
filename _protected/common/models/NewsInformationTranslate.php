<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_information_translate".
 *
 * @property integer $id
 * @property string $information
 * @property integer $news_info_id
 * @property integer $lang_id
 *
 * @property Lang $lang
 * @property NewsInformation $newsInfo
 */
class NewsInformationTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_information_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['information', 'news_info_id', 'lang_id'], 'required'],
            [['news_info_id', 'lang_id'], 'integer'],
            [['information'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['news_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsInformation::className(), 'targetAttribute' => ['news_info_id' => 'id']],
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
            'news_info_id' => 'News Info ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsInfo()
    {
        return $this->hasOne(NewsInformation::className(), ['id' => 'news_info_id']);
    }

    public function getLangId(){
        return $this->lang->name;
    }
}
