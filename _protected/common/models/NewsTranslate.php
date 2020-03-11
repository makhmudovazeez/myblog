<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_translate".
 *
 * @property integer $id
 * @property string $title
 * @property string $message
 * @property integer $news_id
 * @property integer $lang_id
 *
 * @property Lang $lang
 * @property News $news
 */
class NewsTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'message', 'news_id', 'lang_id'], 'required'],
            [['news_id', 'lang_id'], 'integer'],
            [['title', 'message'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }
}
