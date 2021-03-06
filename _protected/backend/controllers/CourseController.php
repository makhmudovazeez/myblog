<?php

namespace backend\controllers;

use Yii;
use common\models\Course;
use common\models\CourseTranslate;
use common\models\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends BackendController
{
    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
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
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post()) && $model->photo = UploadedFile::getInstance($model, 'photo')) {
        
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
            $model->photo->saveAs("../uploads/course/" . $filename);
            $model->image=$filename;
            $model->photo = null;
            $model->save();
            foreach ($model->descriptionb as $lang => $info) {
                $translate = new CourseTranslate(['course_id' => $model->id, 'lang_id' => $lang]);
                $translate->description = $info;
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
     * Updates an existing Course model.
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
                $model->photo->saveAs("../uploads/course/" . $filename);
                $model->image=$filename;
                $model->photo = null;
            }
            $model->save();
            foreach ($model->descriptionb as $lang => $info) {
                $translate = CourseTranslate::findOne(['course_id' => $model->id, 'lang_id' => $lang]);

                if (!$translate) {
                $translate = new CourseTranslate(['course_id' => $model->id, 'lang_id' => $lang]);
                }

                $translate->description = $info;
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
     * Deletes an existing Course model.
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
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}