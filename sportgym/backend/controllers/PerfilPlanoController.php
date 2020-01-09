<?php

namespace backend\controllers;

use common\models\Perfil;
use Yii;
use common\models\PerfilPlano;
use common\models\PerfilPlanoSearch;
use common\models\PerfilSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilPlanoController implements the CRUD actions for PerfilPlano model.
 */
class PerfilPlanoController extends Controller
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
     * Lists all PerfilPlano models.
     * @return mixed
     */

    public function actionIndex()
    {
        $perfis_searchModel = new PerfilSearch();
        $perfis_dataProvider = $perfis_searchModel->search(Yii::$app->request->queryParams);

        // Instanciar modelo e tentar popula-lo
        $modelPerfilPlano = new PerfilPlano();
        $modelPerfilPlano->scenario = 'create';

        if ($modelPerfilPlano->load(Yii::$app->request->post()) && $modelPerfilPlano->validate()) {
            $perfil = Perfil::findOne(['nSocio' => $modelPerfilPlano->nSocio]);
            $modelPerfilPlano->IDperfil = $perfil->IDperfil;

            if ($modelPerfilPlano->save()) {
                Yii::$app->getSession()->setFlash('success', 'Inscrição realizada com sucesso');
            }
        }

        return $this->render('index', ['modelPerfilPlano' => $modelPerfilPlano, 'perfis_dataProvider' => $perfis_dataProvider, 'perfis_searchModel' => $perfis_searchModel]);
    }


    /**
     * Finds the PerfilPlano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDperfil
     * @param integer $IDplano
     * @return PerfilPlano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDperfil, $IDplano)
    {
        if (($model = PerfilPlano::findOne(['IDperfil' => $IDperfil, 'IDplano' => $IDplano])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
