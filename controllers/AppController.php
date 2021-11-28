<?php

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
	public function debug($arr)
	{
		echo '<pre>' . print_r($arr, true) . '</pre>';
	}
}

//функция доступная в view, потому что она находится не внутри class контроллера
function debug($arr)
{
	echo '<pre>' . print_r($arr, true) . '</pre>';
}
