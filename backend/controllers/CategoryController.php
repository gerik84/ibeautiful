<?php

namespace backend\controllers;


use app\models\Category;
use Yii;

class CategoryController extends BaseController
{

    public function actionIndex()
    {
        $model = new Category();

        $model->created_date = time();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save();
            return $this->render('index-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('index', ['model' => $model]);
        }
    }

}
