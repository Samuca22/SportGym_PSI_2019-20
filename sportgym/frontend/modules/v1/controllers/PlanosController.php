<?php

namespace frontend\modules\v1\controllers;

use common\models\Perfil;
use common\models\PerfilPlano;
use common\models\User;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


/**
 * Default controller for the `v1` module
 */
class PlanosController extends ActiveController
{
    public $modelClass = 'common\models\Plano';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }


    public function actionIdPlanos($id)
    {
        $model = new $this->modelClass;
        $records = $model::find()->leftJoin('perfilplano', 'plano.IDplano=perfilplano.IDplano')->where("perfilplano.IDperfil=" . $id)->all();

        if($records){
            return ['id' => $id, 'Planos' => $records];
        } else{
            return ['id' => $id, 'Planos' => null];
        }
        
    }

    // Custom Action GET
    public function actionPlanosTreino()
    {
        $model = new $this->modelClass;
        $records = $model::find()->where(['tipo' => 0])->all();

        return ['PlanosTreino' => $records];
    }


    public function actionPlanosNutricao()
    {
        $model = new $this->modelClass;
        $records = $model::find()->where(['tipo' => 1])->all();

        return ['PlanosNutricao' => $records];
    }

    public function actionIdPlanosTreino($id)
    {
        $model = new $this->modelClass;
        $records = $model::find()->leftJoin('perfilplano', 'plano.IDplano=perfilplano.IDplano')->where("perfilplano.IDperfil=" . $id)->andWhere(['tipo' => 0])->all();

        if($records){
            return ['id' => $id, 'PlanosTreino' => $records];
        } else{
            return ['id' => $id, 'PlanosTreino' => null];
        }
        
    }

    public function actionIdPlanosNutricao($id)
    {
        $model = new $this->modelClass;
        $records = $model::find()->leftJoin('perfilplano', 'plano.IDplano=perfilplano.IDplano')->where("perfilplano.IDperfil=" . $id)->andWhere(['tipo' => 1])->all();

        if($records){
            return ['id' => $id, 'PlanosNutricao' => $records];
        } else{
            return ['id' => $id, 'PlanosNutricao' => null];
        }
        
    }

    // Custom Action POST

    public function actionIdCriarPlanoTreino($id) {
        $nome=Yii::$app->request->post('nome');
        $tipo= 0;
        $descricao=Yii::$app->request->post('descricao');

        $modelPlano = new $this->modelClass;
        $modelPlano->nome=$nome;
        $modelPlano->tipo=$tipo;
        $modelPlano->descricao=$descricao;

        if($modelPlano->validate())
        {
            $perfil = Perfil::findOne($id);
            $modelPlano->save();
            $modelPerfilPlano = new PerfilPlano();
            $modelPerfilPlano->IDperfil = $id;
            $modelPerfilPlano->nSocio = $perfil->nSocio;
            $modelPerfilPlano->IDplano = $modelPlano->IDplano;
            $modelPerfilPlano->dtaplano = date('Y-m-d');
            $modelPerfilPlano->save();
        } else {
            return null;
        }
        return ['plano' => $modelPlano];
    }

    public function actionIdCriarPlanoNutricao($id) {
        $nome=Yii::$app->request->post('nome');
        $tipo= 1;
        $descricao=Yii::$app->request->post('descricao');

        $modelPlano = new $this->modelClass;
        $modelPlano->nome=$nome;
        $modelPlano->tipo=$tipo;
        $modelPlano->descricao=$descricao;

        if($modelPlano->validate())
        {
            $perfil = Perfil::findOne($id);
            $modelPlano->save();
            $modelPerfilPlano = new PerfilPlano();
            $modelPerfilPlano->IDperfil = $id;
            $modelPerfilPlano->nSocio = $perfil->nSocio;
            $modelPerfilPlano->IDplano = $modelPlano->IDplano;
            $modelPerfilPlano->dtaplano = date('Y-m-d');
            $modelPerfilPlano->save();
        } else {
            return null;
        }
        return ['plano' => $modelPlano];
    }

    public function actionUsernameEmail($id)
    {
        $user = User:: findOne($id);

        return[
            'email' => $user->email,
            'username' => $user->username,
        ];
    }
}
