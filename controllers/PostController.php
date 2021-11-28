<?php

namespace app\controllers;

// use yii\web\Controller;

class PostController extends AppController
{

	public function actionTest()
	{
		$names = ['Ivanov', 'Petrov', 'Sidorov'];

		$this->debug($names);

		// echo ('<pre>');
		// print_r($names);
		// exit;

		return $this->render('test', [
			'names' => $names,
		]);
	}
}
