<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_info_translate".
 *
 * @property integer $id
 * @property string $information
 * @property integer $course_info_id
 * @property integer $lang_id
 * @property integer $float
 * @property integer $image
 *
 * @property CourseInformation $courseInfo
 * @property Lang $lang
 */
class CourseInfoTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_info_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['information', 'course_info_id', 'lang_id'], 'required'],
            [['course_info_id', 'lang_id'], 'integer'],
            [['information'], 'string', 'max' => 21789],
            [['float'], 'string', 'max' => 9],
            [['image', 'float'], 'safe'],
            [['course_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseInformation::className(), 'targetAttribute' => ['course_info_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

}
