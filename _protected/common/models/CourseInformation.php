<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_information".
 *
 * @property integer $id
 * @property integer $course_id
 *
 * @property CourseInfoTranslate[] $courseInfoTranslates
 * @property Course $course
 */
class CourseInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id'], 'required'],
            [['course_id'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseInfoTranslates()
    {
        return $this->hasMany(CourseInfoTranslate::className(), ['course_info_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    public function getTitle()
    {
     
        return CourseTranslate::findOne(['course_id' => $this->course_id, 'lang_id' => $this->language])->title;
    }

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }
}
