<?php

namespace app\components\actions;

use Yii;
use yii\base\Action;
/**
 * Description of DeleteRecord
 *
 * @author mr
 */
class DeleteRecord extends Action 
{
    public $modelClass;
    public $redirectAction;
    public $relatedAttributes;
    public $findAttribute;
    public $successMessage = 'Успешно удалено';
    public $errorMessage = 'Ошибка при удалении';
    
    public function run($id)
    {
        $model = $this->findRecord($id);
        if(isset($model) && isset($this->relatedAttribute)) {
            foreach ($this->relatedAttributes as $attribute)
            {
                $model->{$attribute}->delete();
            }
        }
        if($model->delete()) {
            Yii::$app->session->setFlash('success', $this->successMessage);
            return $this->controller->redirect($this->redirectAction);
        } else {
            Yii::$app->session->setFlash('error', $this->errorMessage);
            return $this->controller->redirect($this->redirectAction);
        }
    }
    
    protected function findRecord($id)
    {
        $model = Yii::createObject($this->modelClass);
        $model = $model->findOne([$this->findAttribute => $id]);
        if(isset($model)) {
            return $model;
        } else {
            throw new \yii\web\HttpException(404, 'Ошибка при удалении.');
        }
    }
}
