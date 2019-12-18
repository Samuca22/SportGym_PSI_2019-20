<?php

namespace backend\controllers;

use common\models\LinhaVenda;
use common\models\Perfil;
use common\models\PerfilSearch;
use common\models\User;
use Yii;
use common\models\Venda;
use common\models\VendaSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $vendas_searchModel = new VendaSearch();
        $vendas_dataProvider = $vendas_searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'vendas_searchModel' => $vendas_searchModel,
            'vendas_dataProvider' => $vendas_dataProvider,
        ]);
    }

    /**
     * Displays a single Venda model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $linhasVenda = LinhaVenda::find()->where(['IDvenda' => $id])->all();
        $comprador = User::find()->where(['id' => $model->IDperfil])->one();
        
        return $this->render('view', [
            'model' => $model,
            'comprador' => $comprador,
            'linhasVenda' => $linhasVenda,
        ]);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
