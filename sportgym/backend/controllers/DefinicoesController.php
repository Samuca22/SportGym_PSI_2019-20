<?php


namespace backend\controllers;


use common\models\Ginasio;
use common\models\Perfil;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class DefinicoesController extends  Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],
                    [
                        'actions' => ['update-ginasio', 'create-ginasio'],
                        'allow' => false,
                        'roles' => ['colaborador'],
                    ],
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

    public function actionIndexGinasios()
    {
        $ginasios = Ginasio::find()->all();


        return $this->render('index-ginasios', [
            'ginasios' => $ginasios,
        ]);
    }

    public function actionIndexUtilizador()
    {
        $user = Yii::$app->user->identity;
        $perfil = Perfil::findOne(['IDperfil' => $user->id]);
        return $this->render('index-utilizador', [
            'user' => $user,
            'perfil' => $perfil,
        ]);
    }

    public function actionUpdateUtilizador($id)
    {
        $user = Yii::$app->user->identity;
        $perfil = Perfil::findOne($id);

        if ($perfil->load(Yii::$app->request->post()) && $perfil->validate()) {
            $perfil->save();

            return $this->render('index-utilizador', ['perfil' => $perfil, 'user' => $user]);
        }

        return $this->render('update-utilizador', [
            'perfil' => $perfil,
            'user' => $user,
        ]);
    }

    public function actionUpdateGinasio($id)
    {
        $ginasio = Ginasio::findOne($id);

        if ($ginasio->load(Yii::$app->request->post()) && $ginasio->validate()) {
            $ginasio->save();

            $ginasios = Ginasio::find()->all();
            return $this->render('index-ginasios', ['ginasios' => $ginasios]);
        }

        return $this->render('update-ginasio', [
            'ginasio' => $ginasio,
        ]);
    }

    public function actionCreateGinasio()
    {
        $ginasio = new Ginasio();

        if ($ginasio->load(Yii::$app->request->post()) && $ginasio->save()) {
            $ginasios = Ginasio::find()->all();
            return $this->redirect(['index-ginasios', 'ginasios' => $ginasios]);
        }

        return $this->render('create-ginasio', [
            'ginasio' => $ginasio,
        ]);
    }
}
