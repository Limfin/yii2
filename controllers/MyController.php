<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller {
	public function actionIndex($id = null) {
		$hi = 'Hello, World!';
		$names = ['Ivanov', 'Petrov', 'Sidorov'];

		if (!$id) $id = 'test';

		return $this->render('index',[
			'hello' => $hi,
			'names' => $names,
			'id' => $id,
		]);

		// return $this->render('index', compact('hi', 'names')); //второй способ передачи переменных
	}
}