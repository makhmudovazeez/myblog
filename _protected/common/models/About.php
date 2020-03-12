<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property string $none
 *
 * @property AboutTranslate[] $aboutTranslates
 */
class About extends \yii\db\ActiveRecord
{
    public $informationb = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['none'], 'string', 'max' => 20],
            [['informationb'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'none' => 'None',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAboutTranslates()
    {
        return $this->hasMany(AboutTranslate::className(), ['about_id' => 'id']);
    }

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getInformation()
    {
        return AboutTranslate::findOne(['about_id' => $this->id, 'lang_id' => $this->language])->information;
    }
}
