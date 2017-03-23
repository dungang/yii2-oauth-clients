<?php
/**
 * Author: dungang
 * Date: 2017/3/23
 * Time: 10:20
 */

namespace dungang\oauth\assets;


use yii\web\AssetBundle;

class ChoiceAsset extends AssetBundle
{
    public $css = ['authchoice.css'];
    public $js = [
        'authchoice.js',
    ];
    public $depends = ['yii\web\YiiAsset',];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/' . 'choice';
    }
}