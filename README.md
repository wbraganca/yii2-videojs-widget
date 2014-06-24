yii2-videojs-widget
=====================
The yii2-videojs-widget is a Yii 2 wrapper for the [video.js](http://www.videojs.com/). A JavaScript and CSS library that makes it easier to work with and build on HTML5 video. This is also known as an HTML5 Video Player.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist wbraganca/yii2-videojs-widget "*"
```

or add

```
"wbraganca/yii2-videojs-widget": "*"
```

to the require section of your `composer.json` file.


How to use
----------

Example 1 - HTML5

```php
<?php
    echo \wbraganca\videojs\VideoJsWidget::widget([
        'options' => [
            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
            'poster' => "http://www.videojs.com/img/poster.jpg",
            'controls' => true,
            'preload' => 'auto',
            'width' => '970',
            'height' => '400',
        ],
        'tags' => [
            'source' => [
                ['src' => 'http://vjs.zencdn.net/v/oceans.mp4', 'type' => 'video/mp4'],
                ['src' => 'http://vjs.zencdn.net/v/oceans.webm', 'type' => 'video/webm']
            ],
            'track' => [
                ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
            ]
        ]
    ]);
?>

```

Example 2 - Real Time Messaging Protocol (RTMP)

```php
<?php
    echo \wbraganca\videojs\VideoJsWidget::widget([
        'options' => [
            'class' => 'video-js vjs-default-skin vjs-big-play-centered',
            'controls' => true,
            'preload' => 'auto',
            'width' => '420',
            'height' => '315',
            'data' => [
                'setup' => [
                    'autoplay' => true,
                    'techOrder' =>['flash', 'html5']
                ],
            ],
        ],
        'tags' => [
            'source' => [
                ['src' => 'rtmp://cp67126.edgefcs.net/ondemand/&mp4:mediapm/ovp/content/test/video/spacealonehd_sounas_640_300.mp4', 'type' => 'rtmp/mp4']
            ]
        ]
    ]);
?>

```
