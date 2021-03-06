<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_profile_id
 * @property string $message
 * @property string $name
 * @property string $surname
 *
 * @property UserProfile $userProfile
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['user_profile_id'], 'integer'],
            [['message', 'name', 'surname'], 'string', 'max' => 255],
            [['user_profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['user_profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_profile_id' => 'User Profile ID',
            'message' => 'Message',
            'name' => 'Name',
            'surname' => 'Surname'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'user_profile_id']);
    }

    public function getUsername()
    {
     
        return User::findOne(['id' => $this->user_profile_id])->username;
    }

    public function getFirst()
    {
        return UserProfile::findOne(['id' => $this->user_profile_id])->first;
    }

    public function getLast()
    {
        return UserProfile::findOne(['id' => $this->user_profile_id])->last;
    }


}
