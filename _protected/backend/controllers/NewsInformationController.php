<?php

namespace backend\controllers;

use Yii;
use common\models\NewsInformation;
use common\models\NewsInformationTranslate;
use common\models\NewsInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * NewsInformationController implements the CRUD actions for NewsInformation model.
 */
class NewsInformationController extends BackendController
{

    /**
     * Lists all NewsInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsInformation model.
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
     * Creates a new NewsInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsInformation();

        if ($model->load(Yii::$app->request->post()) && $model->photo = UploadedFile::getInstance($model, 'photo')) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
            $model->photo->saveAs("../uploads/newsinfo/" . $filename);
            $model->photo = null;
            $model->save();
            foreach ($model->informationb as $lang => $info) {
                $translate = new NewsInformationTranslate(['news_info_id' => $model->id, 'lang_id' => $lang]);
                $translate->information = $info;
                $translate->image=$filename;
                $translate->float = $model->floatb;
                $translate->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsInformation model.
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
                $model->photo->saveAs("../uploads/newsinfo/" . $filename);
                $model->photo = null;
            }
            
            $model->save();
            foreach ($model->informationb as $lang => $info) {
                $translate = NewsInformationTranslate::findOne(['news_info_id' => $model->id, 'lang_id' => $lang]);

                if (!$translate) {
                $translate = new NewsInformationTranslate(['news_info_id' => $model->id, 'lang_id' => $lang]);
                }
                if($filename){
                    $translate->image = $filename;
                }
                
                $translate->information = $info;
                $translate->float = $model->floatb;
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
     * Deletes an existing NewsInformation model.
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
     * Finds the NewsInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
