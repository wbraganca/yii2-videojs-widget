<?php
/**
 * @link      https://github.com/wbraganca/yii2-videojs-widget
 * @copyright Copyright (c) 2014 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-videojs-widget/blob/master/LICENSE
 */

namespace wbraganca\videojs;

/**
 * Asset bundle for videojs Widget
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 */
class VideoJsYoutubeAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/videojs-youtube/dist';

    public $js = [
        'Youtube.min.js',
    ];

    public $depends = [
        'wbraganca\videojs\VideoJsAsset'
    ];
}
