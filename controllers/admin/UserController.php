<?php

namespace app\controllers\admin;

// use yii\web\Controller;
use app\controllers\AppController;

class UserController extends AppController
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
