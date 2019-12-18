<?php

namespace backend\controllers;

use common\models\Perfil;
use common\models\PerfilAulaSearch;
use Yii;
use common\models\PerfilAula;
use common\models\PerfilSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilAulaController implements the CRUD actions for PerfilAula model.
 */
class PerfilAulaController extends Controller
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
     * Lists all PerfilAula models.
     * @return mixed
     */
    public function actionIndex()
    {
        $perfis_searchModel = new PerfilSearch();
        $perfis_dataProvider = $perfis_searchModel->search(Yii::$app->request->queryParams);

        $perfisaulas_searchModel = new PerfilAulaSearch();
        $perfisaulas_dataProvider = $perfisaulas_searchModel->search(Yii::$app->request->queryParams);

        // variável usada para a verificação da existência do perfil
        //$perfilExiste = false;

        // Instanciar modelo e tentar popula-lo
        $modelPerfilAula = new PerfilAula();

        if ($modelPerfilAula->load(Yii::$app->request->post()) && $modelPerfilAula->validate()) {
            $perfil = Perfil::findOne(['nSocio' => $modelPerfilAula->nSocio]);
            $modelPerfilAula->IDperfil = $perfil->IDperfil;

            if ($modelPerfilAula->save()) {
                Yii::$app->getSession()->setFlash('success', 'Inscrição realizada com sucesso');
            } 
        }
        return $this->render('index', [
            'modelPerfilAula' => $modelPerfilAula,
            'perfis_dataProvider' => $perfis_dataProvider,
            'perfis_searchModel' => $perfis_searchModel,
            'perfisaulas_searchModel' => $perfisaulas_searchModel,
            'perfisaulas_dataProvider' => $perfisaulas_dataProvider
        ]);
    }

    public function actionMapaAulas()
    {
        return $this->render('mapa-aulas');
    }

    /**
     * Deletes an existing PerfilAula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDperfil, $IDaula)
    {
        if(Yii::$app->user->can('cancelarInscricaoAula')){
            $this->findModel($IDperfil, $IDaula)->delete();
        } else {
            Yii::$app->getSession()->setFlash('warning', 'Sem permissão');
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilAula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IDperfil
     * @param integer $IDaula
     * @return PerfilAula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDperfil, $IDaula)
    {
        if (($model = PerfilAula::findOne(['IDperfil' => $IDperfil, 'IDaula' => $IDaula])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
