<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $facebook
 * @property string $instagram
 * @property string $twitter
 * @property string $telegram
 *
 * @property ContactTranslate[] $contactTranslates
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'phone'], 'required'],
            [['address', 'email', 'phone', 'facebook', 'instagram', 'twitter', 'telegram'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'telegram' => 'Telegram',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactTranslates()
    {
        return $this->hasMany(ContactTranslate::className(), ['contact_id' => 'id']);
    }
}
