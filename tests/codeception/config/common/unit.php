<?php
/**
 * Application config for common unit tests
 */

$params = array_merge(
    require(YII_APP_BASE_PATH . '/common/config/params.php'),
    require(YII_APP_BASE_PATH . '/common/config/params-local.php')
);


return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    require(YII_APP_BASE_PATH . '/common/config/main-local.php'),
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/unit.php'),
    [
        'id' => 'app-common',
        'basePath' => dirname(__DIR__),
        'params'=>$params
    ]
);
