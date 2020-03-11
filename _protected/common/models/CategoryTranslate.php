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
 * @property string $description
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
            [['type', 'category_id', 'lang_id', 'description'], 'required'],
            [['category_id', 'lang_id'], 'integer'],
            [['type', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }
}
