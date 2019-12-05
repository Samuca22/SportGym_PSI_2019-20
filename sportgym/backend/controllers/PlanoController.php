<?php

namespace backend\controllers;

use common\models\Perfil;
use common\models\PerfilPlano;
use common\models\PerfilPlanoSearch;
use common\models\PerfilSearch;
use Yii;
use common\models\Plano;
use common\models\PlanoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanoController implements the CRUD actions for Plano model.
 */
class PlanoController extends Controller
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
     * Lists all Plano models.
     * @return mixed
     */
    public function actionIndexTreino()
    {
        $treino_searchModel = new PlanoSearch();
        $treino_dataProvider = $treino_searchModel->search(Yii::$app->request->queryParams);
        $treino_dataProvider->query->andWhere('treino = 1');

        return $this->render('index-treino', [
            'treino_searchModel' => $treino_searchModel,
            'treino_dataProvider' => $treino_dataProvider,
        ]);
    }

    public function actionIndexNutricao()
    {
        $nutricao_searchModel = new PlanoSearch();
        $nutricao_dataProvider = $nutricao_searchModel->search(Yii::$app->request->queryParams);
        $nutricao_dataProvider->query->andWhere('nutricao = 1');
        

        return $this->render('index-nutricao', [
            'nutricao_searchModel' => $nutricao_searchModel,
            'nutricao_dataProvider' => $nutricao_dataProvider,
        ]);
    }

    /**
     * Displays a single Plano model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plano();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDplano]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Plano model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDplano]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Plano model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $plano = $this->findModel($id);
        $perfisPlano = PerfilPlano::find()->all();
        $possivelApagar = true;

        foreach ($perfisPlano as $perfilPlano) {
            if ($perfilPlano->IDplano == $plano->IDplano) {
                $possivelApagar = false;
                break;
            }
        }

        if($possivelApagar == true){
            if ($plano->treino == 1) {
                $plano->delete();
                Yii::$app->getSession()->setFlash('success', 'Plano Apagado com sucesso');
                return $this->redirect(['index-treino']);
            } else {
                $plano->delete();
                Yii::$app->getSession()->setFlash('success', 'Plano Apagado com sucesso');
                return $this->redirect(['index-nutricao']);
            }
        }
        else{
            if ($plano->treino == 1) {
                Yii::$app->getSession()->setFlash('error', 'Este plano de treino encontra-se associado a pelo menos um sócio');
                return $this->redirect(['index-treino']);
            } else {

                Yii::$app->getSession()->setFlash('error', 'Este plano de nutrição encontra-se associado a pelo menos um sócio');
                return $this->redirect(['index-nutricao']);
            }
        }
        
    }

    /**
     * Finds the Plano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plano::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
