<?php

namespace backend\controllers;

use Yii;
use common\models\CourseInformation;
use common\models\CourseInfoTranslate;
use common\models\CourseInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CourseInformationController implements the CRUD actions for CourseInformation model.
 */
class CourseInformationController extends BackendController
{

    /**
     * Lists all CourseInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseInformation model.
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
     * Creates a new CourseInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CourseInformation();

        if ($model->load(Yii::$app->request->post()) && $model->photo = UploadedFile::getInstance($model, 'photo')) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
            $model->photo->saveAs("../uploads/courseinfo/" . $filename);
            $model->photo = null;
            $model->save();
            foreach ($model->informationb as $lang => $info) {
                $translate = new CourseInfoTranslate(['course_info_id' => $model->id, 'lang_id' => $lang]);
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
     * Updates an existing CourseInformation model.
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
                $model->photo->saveAs("../uploads/courseinfo/" . $filename);
                $model->photo = null;
            }
            
            $model->save();
            foreach ($model->informationb as $lang => $info) {
                $translate = CourseInfoTranslate::findOne(['course_info_id' => $model->id, 'lang_id' => $lang]);

                if (!$translate) {
                $translate = new CourseInfoTranslate(['course_info_id' => $model->id, 'lang_id' => $lang]);
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
     * Deletes an existing CourseInformation model.
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
     * Finds the CourseInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CourseInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CourseInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
