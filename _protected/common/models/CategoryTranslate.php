<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_translate".
 *
 * @property integer $id
 * @property string $type
 * @property integer $category_id
 * @property integer $lang_id
 *
 * @property Category $category
 * @property Lang $lang
 */
class CategoryTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'category_id', 'lang_id'], 'required'],
            [['category_id', 'lang_id'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'type' => 'Type',
            'category_id' => 'Category ID',
            'lang_id' => 'Lang ID',
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
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    
    public function getLangId(){
        return $this->lang->name;
    }
}
