<?php

namespace app\controllers;

// use yii\web\Controller;

class PostController extends AppController
{

	//подключение шаблона basic для всего контроллера PostController
	public $layout = 'basic';
	//-------------------------->

	public function actionIndex()
	{
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
