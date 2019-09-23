<?php
namespace app\controllers;

use app\models\Product;
use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
        //echo $lang;
        //exit;
    }

    /**
     * Lists all Category models.
     * @param int $page
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionIndex($page = 1)
    {
        $per_page = 12;

        // offset - position in sql
        $offset = 0;
        if ($page > 1) {
            $offset = (($page * $per_page ) - $per_page);
        }

        // all count categories
        $all_cats = Category::find()->all();
        $total = count($all_cats);

        // all pages
        $all_pages = ceil($total / $per_page);

        if ($page > $all_pages && $page != 1) return $this->redirect(['/']);

        $sql = 'SELECT * FROM category ORDER BY title LIMIT '.$offset.', '.$per_page.' ';
        $categories = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('index', [
            'categories' => $categories,
            'total' => $total,
            'page' => $page,
            'all_pages' => $all_pages,
            'page_link' => 'category',
        ]);
    }

    /**
     * Displays a single Category model.
     * @param $id
     * @param int $page
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionView($id, $page = 1)
    {
        $per_page = 8;

        // offset - position in sql
        $offset = 0;
        if ($page > 1) {
            $offset = (($page * $per_page ) - $per_page);
        }

        // all count products
        $total = count(Product::find()->where(['category_id' => $id])->all());

        // all pages
        $all_pages = ceil($total / $per_page);

        if ($page > $all_pages && $page != 1) return $this->redirect(['/']);

        $sql = 'SELECT * FROM product WHERE category_id = '.$id.' ORDER BY title LIMIT '.$offset.', '.$per_page.' ';
        $products = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id), // category
            'products' => $products,
            'total' => $total,
            'page' => $page,
            'all_pages' => $all_pages,
            'page_link' => 'category/view',
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
