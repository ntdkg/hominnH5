<?php
namespace app\commands;

class AppAsset extends yii\web\AssetBundle\AssetBundle
{
    public $depends = [
        'bedezign\yii2\audit\web\JSLoggingAsset',
    ];
}
