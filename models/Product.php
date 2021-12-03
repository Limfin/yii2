<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

	// метод который возвращает имя таблицы в базе данных с которой нужно работать в данном случае "users"
	public static function tableName()
	{
		return 'posts';
	}

}