
<?php

    return
        [
        'debug'  => true,
        'app_id'  => 'wx3ecd344c5892b4b7',
        'secret'  => 'ef55bd43e932ab38b5cfe5d73c2d1d7f',
        'token'   => 'ARCHISENSE2017',
        'aes_key' => 't36OCEJGJvu5v4otjuJS63Z5DBoI9GEsSgBqE4pZJ2y',
        'response_type' => 'array',

        'log' => [
            'default' => 'dev', // 默认使用的 channel，生产环境可以改为下面的 prod
            'channels' => [
                // 本地环境
                'dev' => [
                    'driver' => 'daily',
                    'path' => 'app/runtime/logs/easywechat_dev.log',
                    'level' => 'debug',
                ],
                // 测试环境
                'staging' => [
                    'driver' => 'daily',
                    'path' => 'app/runtime/logs/easywechat_staging.log',
                    'level' => 'info',
                ],
                //生产环境
                'prod' => [
                    'driver' => 'daily',
                    'path' => 'app/runtime/logs/easywechat_prod.log',
                    'level' => 'info',
                ],
            ],
        ],

        'http' => [
            'max_retries' => 1,
            'retry_delay' => 500,
            'timeout' => 5.0,
        ],

        'oauth' => [
            'scopes'   => ['snsapi_userinfo'],
            'callback' => '/wechat/oauth-callback',
        ],
    ];
