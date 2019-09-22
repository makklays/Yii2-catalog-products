<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($id)
    {
        return $this->render('index', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        // выпадающий список - категории
        $arr_cats = Category::find()->all();
        $droplist_cats = [];
        if (!empty($arr_cats)) {
            foreach ($arr_cats as $itm) {
                $droplist_cats[$itm->id] = $itm->title;
            }
        }

        // insert into database
        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isPost && $model->validate()) {
                $files = UploadedFile::getInstances($model, 'photos');
                $model->photos = '';
                $model->save();

                // upload file
                if (isset($files) && !empty($files)) {

                    // add directory
                    $path = Yii::$app->basePath . '/web/uploads/photos/' . $model->id;
                    if (!file_exists($path)) {
                        mkdir($path, 0700);
                    }

                    $arr_photo = [];
                    foreach($files as $file) {
                        if (isset($file->baseName) && !empty($file->baseName)) {
                            $filename = $file->baseName . '.' . $file->extension;
                            $file->saveAs(Yii::$app->basePath . '/web/uploads/photos/' . $model->id . '/' . $filename);
                        }
                        $arr_photo[] = $filename;
                    }
                    // записываем название файлов через запятую
                    $model->photos = implode(',', $arr_photo);
                    $model->save();

                    $session = Yii::$app->session;
                    $session->addFlash('alerts', 'Вы успешно добавили нового друга.');
                }
            }

            return $this->redirect(['product/', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'droplist_cats' => $droplist_cats,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $prev_photos = $model->photos;

        // выпадающий список - названий категорий
        $arr_cats = Category::find()->all();
        $droplist_cats = [];
        if (!empty($arr_cats)) {
            foreach ($arr_cats as $itm) {
                $droplist_cats[$itm->id] = $itm->title;
            }
        }

        // insert into database
        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isPost && $model->validate()) {
                $files = UploadedFile::getInstances($model, 'photos');
                $model->photos = $prev_photos;
                $model->save();

                // upload file
                if (isset($files) && !empty($files)) {

                    // add directory
                    $path = Yii::$app->basePath . '/web/uploads/photos/' . $model->id;
                    if (!file_exists($path)) {
                        mkdir($path, 0700);
                    }

                    $arr_photo = [];
                    foreach($files as $file) {
                        if (isset($file->baseName) && !empty($file->baseName)) {
                            $filename = $file->baseName . '.' . $file->extension;
                            $file->saveAs(Yii::$app->basePath . '/web/uploads/photos/' . $model->id . '/' . $filename);
                        }
                        $arr_photo[] = $filename;
                    }
                    // записываем название файлов через запятую
                    $model->photos = implode(',', $arr_photo);
                    $model->save();

                    $session = Yii::$app->session;
                    $session->addFlash('alerts', 'Вы успешно добавили нового друга.');
                }
            }
            return $this->redirect(['product/', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'droplist_cats' => $droplist_cats,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['category/']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
