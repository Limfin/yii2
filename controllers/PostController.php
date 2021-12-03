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

		//добавление данных в БД
		// $article = TestForm::findOne(2);
		// $article->email = '2@2.com';
		// $article->save();

		//удаление строки из БД
		// $article3 = TestForm::findOne(3);
		// $article3->delete();

		$model = new TestForm();

		// $model->name = 'Автор';
		// $model->email = 'mail@mail.com';
		// $model->text = 'Тескт сообщения';
		// $model->test = 'Тест';
		// $model->save();

		//проверка что данные из формы загружены
		if ($model->load(Yii::$app->request->post())) {
			//проверка что данные провалидированы
			if ($model->save()) {
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


		//выводит все записи
		// $cats = Category::find()->all();

		//сортировка выводимых данных из базы. SORT_ASC прямой порядок 1,2,3...10 SORT_DESK обратный порядок 10,9,8...1
		// $cats = Category::find()->orderBy(['id' => SORT_ASC])->all();

		//сортировка выводимых данных из базы.  SORT_DESK обратный порядок 10,9,8...1
		// $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();

		//вывод данных в виде массива
		// $cats = Category::find()->asArray()->all();

		//фильтрация выводимых данных. Есть несколько способов записи:
		// 1 - where('user_id=2'):
		// $cats = Category::find()->asArray()->where('user_id=2')->all();
		// 2- where(['user_id' => 2]):
		// $cats = Category::find()->asArray()->where(['user_id' => 2])->all();
		// 3- where(['like', 'text', 'своей']): выберет все данные, согласно оператору в данном примере "like", где в поле "text" содержится слово "своей"
		// $cats = Category::find()->asArray()->where(['like', 'text', 'своей'])->all();
		// 3- where(['<=', 'user_id', '3']): выберет все данные, согласно оператору в данном примере "<=", где в поле "user_id" содержится слово "3"
		// $cats = Category::find()->asArray()->where(['<=', 'user_id', '3'])->all();

		//вывод не всех записей, а только одну
		//первый способ:
		// $cats = Category::find()->asArray()->where('user_id=2')->limit(1)->all();
		//второй способ:
		// $cats = Category::find()->asArray()->where('user_id=2')->one();

		//подсчет количества записей
		// $cats = Category::find()->asArray()->where('user_id=2')->count();

		//использование метода findOne()
		// $cats = Category::findOne(['user_id' => 2]);

		//использование метода findAll()
		// $cats = Category::findAll(['user_id' => 2]);

		//создание своего sql запроса
		//в этом варианте может быть использована sql инъекция:
		// $query = "SELECT * FROM `posts` WHERE `text` LIKE '%своей%'";
		// $cats = Category::findBySql($query)->all();
		//лучше использовать такой вариант запроса:
		// $query = "SELECT * FROM `posts` WHERE `text` LIKE :search";
		// $cats = Category::findBySql($query, [':search' => '%своей%'])->all();

		//отложенная загрузка
		// $cats = Category::findOne(2);

		//жадная загрузка
		$cats = Category::find()->with('products')->where('id = 2')->all();




		return $this->render('show', [
			'cats' => $cats,
		]);
	}
}
