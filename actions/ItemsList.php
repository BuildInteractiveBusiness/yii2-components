<?php

namespace app\components\actions;

use Yii;
use yii\base\Action;

class ItemsList extends Action 
{
    public $view = 'index';
    public $searchClass = '';
    public $searchMethod = '';
    
    public function run()
    {
        $searchModel = Yii::createObject($this->searchClass);
        $dataProvider = $searchModel->{$this->searchMethod}(Yii::$app->request->queryParams);

        return $this->controller->render($this->view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}