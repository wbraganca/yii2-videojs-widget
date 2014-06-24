<?php
/**
 * @link      https://github.com/wbraganca/yii2-videojs-widget
 * @copyright Copyright (c) 2014 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-videojs-widget/blob/master/LICENSE
 */

namespace wbraganca\videojs;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

/**
 * The yii2-videojs-widget is a Yii 2 wrapper for the video.js
 * See more: http://www.videojs.com/
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 */
class VideoJsWidget extends \yii\base\Widget
{
    /**
     * @var array
     */
    public $options = [];
    /**
     * @var array
     */
    public $jsOptions = [];
    /**
     * @var array
     */
    public $tags = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initOptions();
        $this->registerAssets();
    }

    /**
     * Initializes the widget options
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'videojs-' . $this->getId();
        }
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        $obj = VideoJsAsset::register($view);

        echo "\n" . Html::beginTag('video', $this->options);
        if (!empty($this->tags) && is_array($this->tags)) {
            foreach ($this->tags as $tagName => $tags) {
                if (is_array($this->tags[$tagName])) {
                    foreach ($tags as $tagOptions) {
                        $tagContent = '';
                        if (isset($tagOptions['content'])) {
                            $tagContent = $tagOptions['content'];
                            unset($tagOptions['content']);
                        }
                        echo "\n" . Html::tag($tagName, $tagContent, $tagOptions);
                    }
                } else {
                    throw new InvalidConfigException("Invalid config for 'tags' property.");
                }
            }
        }
        echo "\n" .Html::endTag('video');

        if (!empty($this->jsOptions)) {
            $js = 'videojs("#' . $this->options['id'] . '").ready(' . Json::encode($this->jsOptions). ');';
            $view->registerJs($js);
        }
    }
}
