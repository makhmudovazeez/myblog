<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use common\models\CategoryTranslate;
use common\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BackendController
{

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = Category::find()->one();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->photo = UploadedFile::getInstance($model, 'photo')) {
        
            $model->photo = UploadedFile::getInstance($model, 'photo');
            $filename = (-1)*((int)(microtime(true) * (1000))) . '.' . $model->photo->extension;
            $model->photo->saveAs("../uploads/category/" . $filename);
            $model->image=$filename;
            $model->photo = null;
            $model->created_at = date('Y-m-d');
            $model->save();
            foreach ($model->descriptionb as $lang => $info) {
                $translate = new CategoryTranslate(['category_id' => $model->id, 'lang_id' => $lang]);
                $translate->description = $info;
                if($model->typeb){
                $translate->type = $model->typeb[$lang];
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
     * Updates an existing Category model.
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
                $model->photo->saveAs("../uploads/category/" . $filename);
                $model->image=$filename;
                $model->photo = null;
            }
            $model->created_at = date('Y-m-d');
            $model->save();
            foreach ($model->descriptionb as $lang => $info) {
                $translate = CategoryTranslate::findOne(['category_id' => $model->id, 'lang_id' => $lang]);

                if (!$translate) {
                $translate = new CategoryTranslate(['category_id' => $model->id, 'lang_id' => $lang]);
                }

                $translate->description = $info;
                if($model->typeb){
                $translate->type = $model->typeb[$lang];
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}