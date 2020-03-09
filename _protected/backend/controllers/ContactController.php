<?php

namespace backend\controllers;

use Yii;
use common\models\Contact;
use common\models\ContactTranslate;


/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends BackendController
{
    public function actionIndex()
    {   
        $model = Contact::find()->one();
        if(!$model)
        $model = new Contact();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                foreach ($model->address as $lang => $title) {
                    $translate = ContactTranslate::findOne(['contact_id' => $model->id, 'lang_id' => $lang]);
    
                    if (!$translate) {
                        $translate = new ContactTranslate(['contact_id' => $model->id, 'lang_id' => $lang]);
                    }
    
                    $translate->address = $title;
                    $translate->save();
                }
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
