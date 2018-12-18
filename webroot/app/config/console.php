<?php


$basePath =  dirname(__DIR__);
$webroot = dirname($basePath);



if (strstr($webroot,'homeinn-h5-uat.archisense.cn/homeinn_h5')) {

    //define('ENVIRONMENT', 'staging');
    $db = require(__DIR__ . '/db.staging.php');

}else if (strstr($webroot, 'etro_customer_crm/etro_customer_crm')) {
   // define('ENVIRONMENT', 'prod');
    $db = require(__DIR__ . '/db.prod.php');

}else {
   // define('ENVIRONMENT', 'develop');
    $db =require(__DIR__ . '/db.develop.php');
}



$params = require(__DIR__ . '/params.php');


return [
    'id' => 'app-console',
    'basePath' => $basePath,
    'runtimePath' => $webroot . '/runtime',
    'vendorPath' => $webroot . '/app/vendor',
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',

            'trackActions' => ['*'],

            // Actions to ignore. '*' is allowed as the last character to use as wildcard (eg 'debug/*')
            'ignoreActions' => ['audit/*', 'debug/*'],

            'accessRoles' => null,
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
            // 'userOptions' => []  # user identity class params
            // 'sessionParam' => '' # wechat user info will be stored in session under this key
            // 'returnUrlParam' => '' # returnUrl param stored in session
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'assignmentTable' => 'auth_assignment',
            'itemChildTable' => 'auth_item_child',
            'ruleTable'=>'auth_rule',
        ],

        'errorHandler' => [
            // web error handler
//            'class' => '\bedezign\yii2\audit\components\web\ErrorHandler',
            // console error handler
            'class' => '\bedezign\yii2\audit\components\console\ErrorHandler',
        ],
        'db' => $db,
    ],
    'params' => $params,
];

