<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use common\models\NewsTranslate;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BackendController
{

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->photo = UploadedFile::getInstance($model, 'photo')) {
        
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
            $model->photo->saveAs("../uploads/news/" . $filename);
            $model->image=$filename;
            $model->photo = null;
            $model->save();
            foreach ($model->messageb as $lang => $info) {
                $translate = new NewsTranslate(['news_id' => $model->id, 'lang_id' => $lang]);
                $translate->message = $info;
                if($model->titleb){
                $translate->title = $model->titleb[$lang];
                }
                $translate->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            if($model->photo = UploadedFile::getInstance($model, 'photo')){
                $model->photo = UploadedFile::getInstance($model, 'photo');
                $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
                $model->photo->saveAs("../uploads/news/" . $filename);
                $model->photo = null;
                $model->image = $filename;
            }
            $model->save();
            foreach ($model->messageb as $lang => $info) {
                $translate = NewsTranslate::findOne(['news_id' => $model->id, 'lang_id' => $lang]);

                if (!$translate) {
                $translate = new NewsTranslate(['news_id' => $model->id, 'lang_id' => $lang]);
                }

                $translate->message = $info;
                if($model->titleb){
                    $translate->title = $model->titleb[$lang];
                }
                $translate->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
