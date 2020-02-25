<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $created_at
 *
 * @property CategoryTranslate[] $categoryTranslates
 * @property Course[] $courses
 * @property CourseTranslate[] $courseTranslates
 */
class Category extends \yii\db\ActiveRecord
{
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
            [['created_at'], 'safe'],
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

    public function getTitle()
    {
     
        return CategoryTranslate::findOne(['category_id' => $this->id, 'lang_id' => $this->language]) ? CategoryTranslate::findOne(['category_id' => $this->id, 'lang_id' => $this->language])->type : "";
    }

}
