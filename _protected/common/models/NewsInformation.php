<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_information".
 *
 * @property integer $id
 * @property integer $news_id
 *
 * @property News $news
 * @property NewsInformationTranslate[] $newsInformationTranslates
 */
class NewsInformation extends \yii\db\ActiveRecord
{
    public $photo;
    public $informationb;
    public $floatb;
    
    const right = 'right';
    const left = 'left';

    public function getFloats($index=null){
        $arr = [
            self::right => 'right',
            self::left => 'left',
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
        return 'news_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id'], 'required'],
            [['news_id'], 'integer'],
            [['informationb', 'floatb'], 'safe'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
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
            'news_id' => 'News ID',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsInformationTranslates()
    {
        return $this->hasMany(NewsInformationTranslate::className(), ['news_info_id' => 'id']);
    }

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getTitle()
    {
        return NewsTranslate::findOne(['news_id' => $this->news_id, 'lang_id' => $this->language])->title;
    }

    public function getImage()
    {
        return NewsInformationTranslate::findOne(['news_info_id' => $this->id])->image;
    }

    public function getFloat()
    {
        return NewsInformationTranslate::findOne(['news_info_id' => $this->id])->float;
    }
    public function getInfo()
    {
        return NewsInformationTranslate::findOne(['news_info_id' => $this->id, 'lang_id' => $this->language]) ? NewsInformationTranslate::findOne(['news_info_id' => $this->id, 'lang_id' => $this->language])->information : "No Translate";
    }
    
}
