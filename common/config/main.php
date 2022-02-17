<?php

$params = array_merge(
    require __DIR__.'/params.php',
    require __DIR__.'/params-local.php'
);

$config = [
    // 时区设置为 +8
    'timeZone' => 'Asia/Shanghai',
    // 语言设置为中文
    'language' => 'zh-CN',
    // 前端资源文件路径别名
    'aliases' => [
        '@bower' => '@node_modules',
        '@npm' => '@node_modules',
    ],
    'vendorPath' => dirname(dirname(__DIR__)).'/vendor',
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // https://www.yiiframework.com/doc/guide/2.0/en/db-dao
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $_ENV['DB_DSN'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => $_ENV['DB_CHARSET'],
        ],
        // https://www.yiiframework.com/doc/guide/2.0/en/runtime-logging
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'enableRotation' => false,
                    'levels' => ['error', 'warning'],
                    'maskVars' => [
                        '_SERVER.HTTP_AUTHORIZATION',
                        '_SERVER.PHP_AUTH_USER',
                        '_SERVER.PHP_AUTH_PW',
                        '_SERVER.DB_PASSWORD',
                        '_SERVER.DB_TEST_PASSWORD',
                        '_SERVER.REDIS_PASSWORD',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => !YII_ENV_PROD,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
        ],
    ];
}

return $config;
