<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'SetValues' => [
            'class' => 'common\components\SetValues',
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
        ],
        'errorHandler' => [
            'maxSourceLines' => 20,
            'errorAction' => 'site/error',
        ],
    ],
];
