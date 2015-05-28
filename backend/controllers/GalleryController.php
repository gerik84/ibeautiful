<?php
namespace backend\controllers;

use Yii;

class GalleryController extends BaseController
{
    public function actionIndex()
    {

        $file=Yii::getAlias('@app/pass/to/file');
        $image=Yii::$app->image->load($file);
        header("Content-Type: image/png");
        echo    $image->resize($width,$height)->rotate(30)->render();
        return $this->render('index');
    }

}
