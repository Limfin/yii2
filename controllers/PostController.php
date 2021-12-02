<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\TestForm;

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
			return 'test';
		};

		$model = new TestForm();

		//проверка что данные из формы загружены
		if ($model->load(Yii::$app->request->post())) {
			//проверка что данные провалидированы
			if ($model->validate()) {
				Yii::$app->session->setFlash('success', 'Данные приняты');
				
				// Перезагрузка формы после успешной отправки.
				return $this->refresh();
			} else {
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}

		return $this->render('test', [
			'model' => $model,
		]);
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


		$cats = Category::find()->all();



		return $this->render('show', [
			'cats' => $cats,
		]);
	}
}
