<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

	// метод который возвращает имя таблицы в базе данных с которой нужно работать в данном случае "posts"
	public static function tableName()
	{
		return 'posts';
	}

}
