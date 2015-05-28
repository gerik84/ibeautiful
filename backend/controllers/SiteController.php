<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\Category;

/**
 * Site controller
 */
class SiteController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }



}
