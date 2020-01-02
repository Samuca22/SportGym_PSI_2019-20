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
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);

        $produto_searchModel = new ProdutoSearch();
        $produto_dataProvider = $produto_searchModel->search(Yii::$app->request->queryParams);
        $produto_dataProvider->query->andWhere('estado = 1');

        return $this->render('index', [
            'produto_dataProvider' => $produto_dataProvider,
            'produto_searchModel' => $produto_searchModel,
            'venda' => $venda,
        ]);
    }

    public function actionAdicionarCarrinho($IDproduto)
    {
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);
        $produto = Produto::findOne(['IDproduto' => $IDproduto]);

        if ($venda == null) {
            $venda = new Venda();
            $linhaVenda = new LinhaVenda();

            $venda->iniciarVenda();
            $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        } else {
            $linhaVenda = LinhaVenda::findOne(['IDvenda' => $venda->IDvenda, 'IDproduto' => $IDproduto]);
            if ($linhaVenda == null) {
                $linhaVenda = new LinhaVenda();
                $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
            } else {
                if ($linhaVenda->quantidade < 15) {
                    $linhaVenda->quantidade++;
                    $linhaVenda->atualizarLinhaVenda();
                }
            }
        }
        $linhaVenda->atualizarLinhaVenda();
        $venda->atualizarVenda();
        return $this->redirect('index');
    }

    public function actionVerProduto($IDproduto)
    {
        $produto = Produto::find()->where(['IDproduto' => $IDproduto])->one();

        return $this->render('view-produto', ['produto' => $produto]);
    }

    public function actionCarrinho()
    {
        $user = Yii::$app->user->identity;
        $venda = Venda::find()->where(['IDperfil' => $user->getId()])->andWhere(['estado' => 0])->one();
        $linhaVendas = LinhaVenda::find()->where(['IDvenda' => $venda->IDvenda])->all();

        return $this->render('carrinho-index', [
            'venda' => $venda,
            'linhaVendas' => $linhaVendas,
        ]);
    }

    public function actionMenosQuantidade($IDlinhaVenda)
    {
        $linhaVenda = LinhaVenda::findOne(['IDlinhaVenda' => $IDlinhaVenda]);
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);

        $linhaVenda->menosQuantidade();

        $outrasLinhas = LinhaVenda::find()->where(['IDvenda' => $venda->IDvenda]);
        if ($outrasLinhas->count() != 0) {
            $venda->atualizarVenda();
        } else {
            $venda->delete();
            return $this->redirect('index');
        }


        return $this->redirect('carrinho');
    }

    public function actionMaisQuantidade($IDlinhaVenda)
    {
        $linhaVenda = LinhaVenda::findOne(['IDlinhaVenda' => $IDlinhaVenda]);
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);

        $linhaVenda->maisQuantidade();
        $venda->atualizarVenda();

        return $this->redirect('carrinho');
    }

    public function actionFinalizarVenda()
    {
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);

        $venda->finalizarVenda();

        return $this->redirect('index');
    }

    public function actionApagarVenda()
    {
        $venda = Venda::findOne(['IDperfil' => Yii::$app->user->getId(), 'estado' => 0]);
        $linhasVendas = LinhaVenda::find()->where(['IDvenda' => $venda->IDvenda])->all();

        foreach($linhasVendas as $linhaVenda)
        {
            $linhaVenda->delete();
        }
        $venda->delete();

        return $this->redirect('index');
    }
}
