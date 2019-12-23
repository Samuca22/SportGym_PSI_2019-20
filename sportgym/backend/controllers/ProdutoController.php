<?php

namespace backend\controllers;

use Yii;
use common\models\Produto;
use common\models\ProdutoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//Biblioteca que permite fazer upload de um ficheiro
use yii\web\UploadedFile;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
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
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],
                    [
                        'actions' => ['create', 'delete'],
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

    /**
     * Lists all Produto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
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
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produto();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $nome_imagem = 'prod' . rand(1, 9999);    //Atribui nome aleatório ao ficheiro 
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->estado = 0;

            if ($model->file == null) {
            } else {
                $model->file->saveAs('../../common/uploads/produtos/' . $nome_imagem . '.' . $model->file->extension);
                $model->fotoProduto = $nome_imagem . '.' . $model->file->extension;
            }

            $model->save();

            Yii::$app->getSession()->setFlash('success', 'Produto criado com sucesso');
            return $this->redirect(['view', 'id' => $model->IDproduto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $nome_imagem = 'prod' . rand(1, 9999);    //Atribui nome aleatório ao ficheiro 
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file == null) {
            } else {
                $model->file->saveAs('../../common/uploads/produtos/' . $nome_imagem . '.' . $model->file->extension);
                $model->fotoProduto = $nome_imagem . '.' . $model->file->extension;
            }

            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Produto editado com sucesso');
            return $this->redirect(['view', 'id' => $model->IDproduto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('success', 'Produto eliminado com sucesso');
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionAlterarEstado($id)
    {
        if (Yii::$app->user->can('alterarEstadoProdutos')) {
            $model = $this->findModel($id);
            $model->alterarEstado();
            $model->save(false);

            Yii::$app->getSession()->setFlash('success', "Estado do produto $model->nome alterado com sucesso");
        } else {
            Yii::$app->getSession()->setFlash('warning', "Sem permissão");
        }


        return $this->redirect('index');
    }

    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
