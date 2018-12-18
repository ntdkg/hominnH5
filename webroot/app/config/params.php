<?php

    return [
        'WECHAT' => require(__DIR__.'/wechat.setting.php'),
        'JwtConfig'=>[
            'header'=>[
                'typ'=> 'JWT',
                'alg'=> 'HS256'
            ],
            'lease'=>'7200',
            'iss'=>'crm.misurino.cn',//可自定义，一般为项目名称
            'secret'=>'ef133a4ece7d724614e24dc1f760f6dc',//可自定义，一般为md5(项目名称)
        ],

    ];