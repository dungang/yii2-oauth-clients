<?php
/**
 * Author: dungang
 * Date: 2017/3/23
 * Time: 10:23
 */

namespace dungang\oauth\widgets;

use dungang\oauth\assets\ChoiceAsset;
use yii\base\Widget;
use yii\helpers\Html;

class ChoiceWidget extends Widget
{

    public $authRoute = '/oauth';

    public $options = [];

    protected $clients = [];

    public function init()
    {
        if (!empty(\Yii::$app->params['authClients']) && is_array(\Yii::$app->params['authClients'])) {
            $this->clients = array_filter(\Yii::$app->params['authClients'],function (&$client){
                $enabled = !empty($client['enabled']);
                unset($client['enabled']);
                return$enabled;
            });
        }
    }

    protected function createClient($clients) {
        $content = '';
        $names = array_keys($clients);
        foreach ($names as $name) {
            $span = Html::tag('span','',[
                'class'=>'auth-icon ' . $name
            ]);
            $a = Html::a($span,[$this->authRoute,'authclient'=>$name],[
                'class'=>'auth-link ' . $name
            ]);
            $content .= Html::tag('li',$a);
        }
        return Html::tag('ul',$content,['class'=>'auth-clients']);

    }

    public function run()
    {
        ChoiceAsset::register($this->view);
        $clients = $this->createClient($this->clients);
        return Html::tag('div',$clients,$this->options);
    }
}