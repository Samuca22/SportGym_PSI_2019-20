<?php

namespace frontend\controllers;

use common\models\LinhaVenda;
use Yii;
use common\models\Produto;
use common\models\ProdutoSearch;
use common\models\Venda;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class LojaController extends Controller
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
     * Lists all Produto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId()]);
        if ($venda != null) {
            $venda->atualizarTotal();
        }
        $searchModel = new ProdutoSearch();
        $produto_dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'produto_dataProvider' => $produto_dataProvider,
            'searchModel' => $searchModel,
            'venda' => $venda,
        ]);
    }

    public function actionAdicionarCarrinho($IDproduto)
    {
        $user = Yii::$app->user->identity;
        $venda = Venda::findOne(['IDperfil' => $user->id]);

        if ($venda == null) {
            $venda = new Venda();
            $linhaVenda = new LinhaVenda();

            $venda->iniciarVenda();
            $linhaVenda->iniciarLinhaVenda($venda->IDvenda);
            $linhaVenda->IDproduto = $IDproduto;
        } else {
            $linhaVenda = LinhaVenda::findOne(['IDvenda' => $venda->IDvenda, 'IDproduto' => $IDproduto]);
            if ($linhaVenda == null) {
                $linhaVenda = new LinhaVenda();
                $linhaVenda->iniciarLinhaVenda($venda->IDvenda);
                $linhaVenda->IDproduto = $IDproduto;
            }
            $linhaVenda->IDproduto = $IDproduto;
            $linhaVenda->quantidade++;
            $linhaVenda->atualizarSubTotal();
        }
        return $this->redirect('index');
    }

    public function actionCarrinho()
    {
        $user = Yii::$app->user->identity;
        $venda = Venda::findOne(['IDperfil' => $user->id]);
        $linhaVendas = LinhaVenda::find(['IDvenda' => $venda->IDvenda])->all();

        return $this->render('carrinho-index', [
            'venda' => $venda,
            'linhaVendas' => $linhaVendas,
        ]);
    }
}
