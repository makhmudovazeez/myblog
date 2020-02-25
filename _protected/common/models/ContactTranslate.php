<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_translate".
 *
 * @property integer $id
 * @property string $address
 * @property integer $contact_id
 * @property integer $lang_id
 *
 * @property Lang $lang
 * @property Contact $contact
 */
class ContactTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'contact_id', 'lang_id'], 'required'],
            [['contact_id', 'lang_id'], 'integer'],
            [['address'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['contact_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'contact_id' => 'Contact ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contact_id']);
    }
}
