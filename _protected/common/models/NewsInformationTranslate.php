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
 * @property integer $image
 * @property integer $float
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
            [['information', 'image'], 'string', 'max' => 21500],
            [['float'], 'string', 'max' => 9],
            [['float'], 'safe'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['news_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsInformation::className(), 'targetAttribute' => ['news_info_id' => 'id']],
        ];
    }

}
