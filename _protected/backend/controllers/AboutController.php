<?php

namespace backend\controllers;

use Yii;
use common\models\About;
use common\models\AboutTranslate;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends BackendController
{
    public function actionIndex()
    {   
        $model = About::find()->one();
        if(!$model)
        $model = new About();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                foreach ($model->informationb as $lang => $title) {
                    $translate = AboutTranslate::findOne(['about_id' => $model->id, 'lang_id' => $lang]);
    
                    if (!$translate) {
                        $translate = new AboutTranslate(['about_id' => $model->id, 'lang_id' => $lang]);
                    }
    
                    $translate->information = $title;
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
