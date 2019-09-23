<?php
namespace app\controllers;

use Yii;
use app\models\ProductFeedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * ProductfeedbackController implements the CRUD actions for ProductFeedback model.
 */
class ProductfeedbackController extends Controller
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

    public function init()
    {
        $lang = Yii::$app->request->get('lang');
        Yii::$app->language = $lang;
    }

    /**
     * Creates a new ProductFeedback model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($prod_id = NULL)
    {
        if (is_null($prod_id)) return $this->redirect(['product/']);

        $model = new ProductFeedback();
        $model->product_id = (integer) $prod_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product/?id='.$model->product_id.'#feedbacks']);
        }

        return $this->render('/product-feedback/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductFeedback model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product/?id='.$model->product_id.'#feedbacks']);
        }

        return $this->render('/product-feedback/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductFeedback model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $prod_id = $model->product_id;
        $model->delete();

        return $this->redirect(['product/?id='.$prod_id.'#feedbacks']);
    }

    /**
     * Finds the ProductFeedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductFeedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductFeedback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
