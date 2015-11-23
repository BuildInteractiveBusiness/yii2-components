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
class CreateRecord extends Action
{
    public $view;
    public $modelClass;
    public $redirectAction;
    public $successMessage = '';
    
    public function run()
    {
        $model = Yii::createObject($this->modelClass);
        
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
}
