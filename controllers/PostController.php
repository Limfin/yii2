<?php

namespace app\controllers;

use Yii;

// use yii\web\Controller;

class PostController extends AppController
{

	//подключение шаблона basic для всего контроллера PostController
	public $layout = 'basic';
	//-------------------------->

	public function actionIndex()
	{
		if(Yii::$app->request->isAjax) {
			echo ('<pre>');
			print_r($_GET);
			// exit;

			return 'test';
		};

		return $this->render('test');
	}

	public function actionShow()
	{
		//подключение шаблона basic для конкретного action
		// $this->layout = 'basic';
		//-------------------------->
		return $this->render('show');
	}
}
