<?php

namespace app\controllers;

// use yii\web\Controller;

class MyController extends AppController
{
	public function actionIndex($id = null)
	{
		$hi = 'Hello, World!';
		$names = ['Ivanov', 'Petrov', 'Sidorov'];

		if (!$id) $id = 'test';

		return $this->render('index', [
			'hello' => $hi,
			'names' => $names,
			'id' => $id,
		]);

		// return $this->render('index', compact('hi', 'names')); //второй способ передачи переменных
	}

	public function actionBlogPost()
	{
		// my/blog-post вызов action в названии которого больше одного слова
		return 'Blog Post';
	}
}
