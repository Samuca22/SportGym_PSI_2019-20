<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'v1' => [
            'class' => 'frontend\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/produtos',
                    'pluralize' => false,
                    'except'  => ['create', 'delete', 'view'],
                    'extraPatterns' => [
                        'PUT {id}/alterar-estado' => 'alterar-estado', // 'alterar-estado' é 'actionAlterarEstado'. Altera a visibilidade do produto na loja
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/perfis',
                    'pluralize' => false,
                    'except'  => ['create', 'delete'],
                    'extraPatterns' => [
                        'GET {id}/enviar-dados' => 'enviar-dados',
                        'GET total' => 'total',
                        'GET sexo-masculino' => 'perfis-sexo-masculino',
                        'GET total-masculino' => 'total-masculino',
                        'GET sexo-feminino' => 'perfis-sexo-feminino',
                        'GET total-feminino' => 'total-feminino',

                        'PUT {id}/alterar-peso' => 'alterar-peso',
                        'PUT {id}/alterar-altura' => 'alterar-altura',
                    ],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/planos',
                    'pluralize' => false,
                    'except' => ['update'],
                    'extraPatterns' => [
                        'GET treino' => 'planos-treino', // 'planos-treino' é 'actionPlanosTreino'. Devolve todos os planos de treino
                        'GET nutricao' => 'planos-nutricao', // 'planos-nutricao' é 'actionPlanosNutricao'. Devolve todos os planos de nutricao
                        'GET {id}/planos' => 'id-planos', // 'id-planos' é 'actionIdPlanos'. Devolve todos os planos atribuidos ao perfil id.
                        'GET {id}/planos-treino' => 'id-planos-treino', // 'id-planos-treino' é 'actionIdPlanosTreino'. Devolve todos os planos de treino atribuidos ao perfil id.
                        'GET {id}/planos-nutricao' => 'id-planos-nutricao', // 'id-planos-nutricao' é 'actionIdPlanosNutricao'. Devolve todos os planos de nutricao atribuidos ao perfil id.

                        'POST {id}/novo-plano-treino' => 'id-criar-plano-treino', // 'id-criar-plano-treino' é 'actionIdCriarPlanoTreino'. Cria um plano de treino e atribui ao perfil id.
                        'POST {id}/novo-plano-nutricao' => 'id-criar-plano-nutricao', // 'id-criar-plano-nutricao' é 'actionIdCriarPlanoNutricao'. Cria um plano de Nutricao e atribui ao perfil id.
                    ],
                ],
            ],
        ],
    ],

    'params' => $params,
];
