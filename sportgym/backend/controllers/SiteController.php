<?php

namespace backend\controllers;

use common\models\Ginasio;
use common\models\Perfil;
use common\models\Venda;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
         //variavel para buscar o id de o perfil logado
        $nomeApresentacao = Perfil::findOne(Yii::$app->user->getId()); // variavel para associar o perfil do utilizador logado


        $venda_dataProvider = new ActiveDataProvider([
            'query' => Venda::find()->limit(5)->orderBy(['dataVenda' => SORT_DESC]), // LIMITE DE LINHAS POR TABELA E ORDERNAR POR DATA MAIS RECENTE
            'pagination' => false,  //paginação a 0
        ]);

        $ginasio_dataProvider = new ActiveDataProvider([
            'query' => Ginasio::find(),
        ]);

        return $this->render('index', [
            'venda_dataProvider' => $venda_dataProvider,
            'ginasio_dataProvider' => $ginasio_dataProvider,
            'nomeApresentacao' => $nomeApresentacao,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Fica Logado
            if (Yii::$app->user->can('entrarBack')) {

                return $this->goBack();
            } else {

                if (Yii::$app->user->can('entrarFront')) {
                    
                    Yii::$app->user->logout();
                    Yii::$app->getSession()->setFlash('error', 'Não tem permissão! Ou dados Incorretos!');
                }

                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }

        } else {

            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
