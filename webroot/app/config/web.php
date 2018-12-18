<?php

$params = require(__DIR__ . '/params.php');

$basePath = dirname(__DIR__);
$webroot = dirname($basePath);

switch (ENVIRONMENT) {
    case "develop":
        $db = require(__DIR__ . '/db.develop.php');
        break;
    case "staging":
        $db = require(__DIR__ . '/db.staging.php');
        break;
    case "prod":
        $db = require(__DIR__ . '/db.prod.php');
        break;
    default:
        $db = require(__DIR__ . '/db.php');
        break;
}

$config = [
    'id' => 'app',
    'basePath' => $basePath,
    'defaultRoute' => 'index/index',
    /*'defaultRoute' => 'home',*/
    'language' => 'en-US',
    'timeZone' => 'PRC',
    'controllerNamespace' => 'app\modules\backend\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0C2pj6C9cBivhdodpoSSo8DlUwu449rv',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'queue' => [
            'class' => 'shmilyzxt\queue\queues\DatabaseQueue', //队列使用的类
            'jobEvent' => [ //队列任务事件配置，目前任务支持2个事件
                'on beforeExecute' => ['shmilyzxt\queue\base\JobEventHandler','beforeExecute'],
                'on beforeDelete' => ['shmilyzxt\queue\base\JobEventHandler','beforeDelete'],
            ],
            'connector' => $db,
            'table' => 'jobs', //存储队列数据表名
            'queue' => 'default', //队列的名称
            'expire' => 60, //任务过期时间
            'maxJob' =>0, //队列允许最大任务数，0为不限制
            'failed' => [//任务失败日志记录（目前只支持记录到数据库）
                'logFail' => true, //开启任务失败处理
                'provider' => [ //任务失败处理类
                    'class' => 'shmilyzxt\queue\failed\DatabaseFailedProvider',
                    'db' => $db,
                    'table' => 'failed_jobs' //存储失败日志的表名
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '',
            'rules' => [
                /*'/' =>  '/admin/',*/
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],

        'wechat' => [
            'class' => 'app\components\MyWechat',
            // 'userOptions' => []  # 用户身份类参数
            // 'sessionParam' => '' # 微信用户信息将存储在会话在这个密钥
            // 'returnUrlParam' => '' # returnUrl 存储在会话中
        ],

        'user' => [
            'identityClass' => 'app\modules\backend\models\SysUser', // User must implement the IdentityInterface
            'enableAutoLogin' => false,
            // 'loginUrl' => ['user/login'],
            // ...
        ],

        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'assignmentTable' => 'auth_assignment',
            'itemChildTable' => 'auth_item_child',
            //'ruleTable'=>'auth_rule',
            'defaultRoles' => ['guest'],
        ],
    ],
    'modules' => [
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',

            'trackActions' => ['*'],

            // Actions to ignore. '*' is allowed as the last character to use as wildcard (eg 'debug/*')
            'ignoreActions' => ['audit/*', 'debug/*'],

            'accessRoles' => null,
        ]


    ],


    //'errorHandler' => [
        // web error handler
       // 'class' => '\bedezign\yii2\audit\components\web\ErrorHandler',
        // console error handler
        //'class' => '\bedezign\yii2\audit\components\console\ErrorHandler',
  //  ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
    $config['components']['db']['enableSchemaCache'] = false;
}

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
      //  'allowedIPs' => ['127.0.0.1'],
    ];
}



return $config;