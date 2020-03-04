<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_information".
 *
 * @property integer $id
 * @property string $image
 * @property integer $course_id
 *
 * @property CourseInfoTranslate[] $courseInfoTranslates
 * @property Course $course
 */
class CourseInformation extends \yii\db\ActiveRecord
{
    public $photo;
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
            [['image'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
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
            'course_id' => 'Course ID',
            'photo' => 'Photo',
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
     
        return CourseTranslate::findOne(['course_id' => $this->course_id])->title;
    }
}
