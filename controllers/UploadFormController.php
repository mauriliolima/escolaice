<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class UploadFormController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                //throw new \yii\base\Exception('Erro');
                return $this->render('form', ['model' => $model]);
            }
        }

        return $this->render('form', ['model' => $model]);
    }
}