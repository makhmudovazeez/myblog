<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_info_image".
 *
 * @property integer $id
 * @property string $image
 * @property integer $course_info_id
 * @property integer $float
 *
 * @property CourseInformation $courseInfo
 */
class CourseInfoImage extends \yii\db\ActiveRecord
{
    public $photo;
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
        return 'course_info_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'course_info_id', 'float'], 'required'],
            [['course_info_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['float'], 'string', 'max' => 255],
            [['course_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseInformation::className(), 'targetAttribute' => ['course_info_id' => 'id']],
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
            'course_info_id' => 'Course Info ID',
            'photo' => 'Photo',
            'float' => 'Float',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseInfo()
    {
        return $this->hasOne(CourseInformation::className(), ['id' => 'course_info_id']);
    }

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getInfo()
    {
        return CourseInfoTranslate::findOne(['course_info_id' => $this->course_info_id, 'lang_id' => $this->language])->information;
    }
}
