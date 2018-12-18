<?php

// debug
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// env
switch ($_SERVER['SERVER_NAME']) {

    case 'local.homeinn.com' :

        define('ENVIRONMENT', 'develop');
        define('YII_DEBUG', true);
        define('YII_ENV', 'dev');
        break;
    case 'homeinn-h5-uat.archisense.cn' :

        define('ENVIRONMENT', 'staging');
        define('YII_DEBUG', true);
        define('YII_ENV', 'test');
        break;
    case 'thanksgiving.solomotech.cn' :

        define('ENVIRONMENT', 'prod');
        define('YII_DEBUG', true);
        define('YII_ENV', 'prod');
        break;
    default:

        define('ENVIRONMENT', '');
        define('YII_ENV', 'dev');
        define('YII_DEBUG', true);
        break;
}

// comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

defined('CRM') or define('CRM', 'crmadmin');

require(__DIR__ . '/app/vendor/autoload.php');
require(__DIR__ . '/app/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/app/config/web.php');



(new yii\web\Application($config))->run();
