<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $image
 *
 * @property CategoryTranslate[] $categoryTranslates
 * @property Course[] $courses
 * @property CourseTranslate[] $courseTranslates
 */
class Category extends \yii\db\ActiveRecord
{
    public $photo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['created_at', 'image'], 'safe'],
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
            'created_at' => 'Created At',
            'image' => 'Image',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTranslates()
    {
        return $this->hasMany(CategoryTranslate::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['category_id' => 'id']);
    }


    public function getLanguage(){
        return Lang::findOne(['url' => Yii::$app->language])->id;
    }

    public function getType()
    {
        return CategoryTranslate::findOne(['category_id' => $this->id, 'lang_id' => $this->language]) ? CategoryTranslate::findOne(['category_id' => $this->id, 'lang_id' => $this->language])->type : "no translate";
    }

}
