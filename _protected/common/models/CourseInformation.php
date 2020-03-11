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
    public $informationb = [];
    public $photo;
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
            [['informationb', 'floatb'], 'safe'],
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

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getTitle()
    {
        return CourseTranslate::findOne(['course_id' => $this->course_id, 'lang_id' => $this->language]) ? CourseTranslate::findOne(['course_id' => $this->course_id, 'lang_id' => $this->language])->title : "No Translate";
    }
    public function getImage()
    {
        return CourseInfoTranslate::findOne(['course_info_id' => $this->id])->image;
    }

    public function getFloat()
    {
        return CourseInfoTranslate::findOne(['course_info_id' => $this->id]) ? CourseInfoTranslate::findOne(['course_info_id' => $this->id])->float : "right";
    }
    public function getInfo()
    {
        return CourseInfoTranslate::findOne(['course_info_id' => $this->id, 'lang_id' => $this->language]) ? CourseInfoTranslate::findOne(['course_info_id' => $this->id, 'lang_id' => $this->language])->information : "No Translate";
    }

}
