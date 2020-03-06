<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property integer $category_id
 *
 * @property Category $category
 * @property CourseInformation[] $courseInformations
 */
class Course extends \yii\db\ActiveRecord
{
    public $photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'image'], 'required'],
            [['category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'safe'],
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
            'category_id' => 'Category ID',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseInformations()
    {
        return $this->hasMany(CourseInformation::className(), ['course_id' => 'id']);
    }

    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getType()
    {
     
        return CategoryTranslate::findOne(['category_id' => $this->category_id, 'lang_id' => $this->language])->type;
    }

    public function getTitle()
    {
     
        return CourseTranslate::findOne(['course_id' => $this->id, 'lang_id' => $this->language]) ? CourseTranslate::findOne(['course_id' => $this->id, 'lang_id' => $this->language])->title : "No Translation";
    }

    public function getDescription()
    {
     
        return CourseTranslate::findOne(['course_id' => $this->id, 'lang_id' => $this->language]) ? CourseTranslate::findOne(['course_id' => $this->id, 'lang_id' => $this->language])->description : "No Translation";
    }
    
    public function getLangId(){
        return $this->lang->name;
    }

    


}
