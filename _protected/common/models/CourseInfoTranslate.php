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
 * @property integer $image
 *
 * @property CourseInformation $courseInfo
 * @property Lang $lang
 */
class CourseInfoTranslate extends \yii\db\ActiveRecord
{
    public $photo;
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
            [['image'], 'safe'],
            ['photo', 'file', 'extensions' => 'jpg, jpeg, png', 'skipOnEmpty' => true],
            [['course_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseInformation::className(), 'targetAttribute' => ['course_info_id' => 'id']],
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
            'information' => 'Information',
            'course_info_id' => 'Course Info ID',
            'lang_id' => 'Lang ID',
            'image' => 'Image',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseInfo()
    {
        return $this->hasOne(CourseInformation::className(), ['id' => 'course_info_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
    
    public function getLangId(){
        return $this->lang->name;
    }

}
