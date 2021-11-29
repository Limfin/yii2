<?php

namespace app\controllers;

use Yii;

// use yii\web\Controller;

class PostController extends AppController
{

	//подключение шаблона basic для всего контроллера PostController
	public $layout = 'basic';
	//-------------------------->

	public function beforeAction($action)
	{
		if($action->id == 'index') {
			$this->enableCsrfValidation = false; //отключение проверки csrf токена при отправке запроса методом post
		}
		return parent::beforeAction($action);
	}

	public function actionIndex()
	{
		if(Yii::$app->request->isAjax) {
			echo ('<pre>');
			print_r($_POST);
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

		//добавление мета тега title для страницы show
		$this->view->title = 'Title внутри контроллера';

		//добавление мета тега keywords для страницы show
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевые слова заданные в PostController.php']);

		//добавление мета тега description для страницы show
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'description заданный в PostController.php']);

		return $this->render('show');
	}
}
