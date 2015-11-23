<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\actions;

use Yii;
use yii\base\Action;
/**
 * Description of CreateRecord
 *
 * @author mr
 */
class UpdateRecord extends Action
{
    public $view;
    public $modelClass;
    public $redirectAction;
    public $successMessage = '';
    public $findAttribute;
    
    public function run($id)
    {
        $model = $this->findRecord($id);
        
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->setFlash('success', $this->successMessage);
            return $this->controller->redirect($this->redirectAction);
        } else {
            return $this->controller->render($this->view, [
                'model' => $model,
            ]);
        }
    }
    
    protected function findRecord($id)
    {
        $model = Yii::createObject($this->modelClass);
        $model = $model->findOne([$this->findAttribute => $id]);
        if(isset($model)) {
            return $model;
        } else {
            throw new \yii\web\HttpException(404, 'Страница не существует');
        }
    }
}