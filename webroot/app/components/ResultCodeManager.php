<?php

namespace app\components;
use Yii;
use yii\base\Component;


class ResultCodeManager extends Component {

    const SUCCESS = 0;
    const ERROR = 40001;
    const LOGIN_FAILURE = 40002;
    const PERMISSION_DEND = 40003;
    const MISS_REQUIRED_PARAM= 40004;
    const E_TOKEN_INVALID = 40014;
    const E_TOKEN_EXPIRED = 40015;
    const NO_USER_DATA = 40016;
    const NO_CODE_DATA = 40017;
    const QR_CODE_REPRTITION = 40018;
    const QR_CODE_GENERATION_FAILED = 40019;
    const NO_TAG_DATA = 40020;
    const TAG_IS_USE = 40021;
    const NO_MENU_DATA = 40022;
    const NO_DATA_DELETE = 40023;
    const EMPTY_ORDER_DATA = 40024;
    const NO_KEYWORD_DATA = 40025;



    static public $messages = array(
        self::SUCCESS => "Success",
        self::ERROR => "Unknown Error",
        self::LOGIN_FAILURE => "Login Failure",
        self::PERMISSION_DEND => "Permission Dend",
        self::MISS_REQUIRED_PARAM => "Missing Required Parameters",
        self::E_TOKEN_INVALID => "Access token invalid or no longer valid",
        self::E_TOKEN_EXPIRED=>'Access token expired',
        self::NO_USER_DATA=>'No User Data',
        self::NO_CODE_DATA=>'No Code Data',
        self::QR_CODE_REPRTITION=>'QR Code Repetition',
        self::QR_CODE_GENERATION_FAILED=>'QR Code Generation Failed',
        self::NO_TAG_DATA=>'No Tag Data',
        self::TAG_IS_USE=>'Tag Is Used For Other QR Code',
        self::NO_MENU_DATA=>'No Menu Data',
        self::NO_DATA_DELETE=>'No Data Delete',
        self::EMPTY_ORDER_DATA=>'Empty Order Delete',
        self::NO_KEYWORD_DATA=>'No Keyword Data',
    );

}
