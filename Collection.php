<?php
/**
 * Author: dungang
 * Date: 2017/6/6
 * Time: 8:54
 */

namespace dungang\oauth;


class Collection extends \yii\authclient\Collection
{
    public function init()
    {
        parent::init();
        if (!empty(\Yii::$app->params['authClients']) && is_array(\Yii::$app->params['authClients'])) {
            $this->clients = array_filter(\Yii::$app->params['authClients'],function (&$client){
                $enabled = !empty($client['enabled']);
                unset($client['enabled']);
                return$enabled;
            });
        }
    }
}