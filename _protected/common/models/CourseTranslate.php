<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_translate".
 *
 * @property integer $id
 * @property string $title
 * @property integer $course_id
 * @property integer $lang_id
 * @property integer $description
 *
 * @property Course $course
 * @property Lang $lang
 */
class CourseTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'course_id', 'lang_id', 'description'], 'required'],
            [['course_id', 'lang_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
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
            'title' => 'Title',
            'course_id' => 'Course ID',
            'lang_id' => 'Lang ID',
            'description' => 'Description',
        ];
    }
}
