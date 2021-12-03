<?php

namespace app\models;

// use yii\base\Model;
use yii\db\ActiveRecord;

/*class TestForm extends Model
{

	public $name;
	public $email;
	public $text;
	public $test;

	//задание названий лейблов для инпутов формы
	public function attributeLabels()
	{
		return [
			'name' => 'Имя в модели',
			'email' => 'email в модели',
			'text' => 'Текстовое поле в модели',
		];
	}

	//валидация формы
	public function rules() {
		return [
			//можно по отдельности к каждому инпуту задавать правила валидации либо можно перечислить инпуты в массиве - [['name', 'email'], 'required'],
			['name', 'required', 'message' => 'Поле обязательно'],
			['email', 'required'],

			//валидалия на то что введен email
			['email', 'email'],

			//валидация на минимальное количество символов. tooShort используется вместо message для атрибута min
			['name', 'string', 'min' => 2, 'tooShort' => 'подпись для слишком короткого сообщения'],
			//валидация на минимальное количество символов. tooLong используется вместо message для атрибута max
			['name', 'string', 'max' => 10, 'tooLong' => 'подпись для слишком длинного сообщения'],
			//если стандартное сообщение подписи об ошибке не нужно менять то можно сразу указать минимально и максимальное количество символов
			// ['name', 'string', 'length' => [2,10]],

			//кастомный валидатор myRule, он срабатывает только на сервере. На клиенте(в браузере ошибка не отобразится)
			['test', 'myRule'],

			['test', 'required'],

			//фильтр trim удаляет пробелы в начале и конце сообщения
			['text', 'trim'],
		];
	}

	//описание функции кастомного валидатора myRule. он срабатывает только на сервере. На клиенте(в браузере ошибка не отобразится)
	public function myRule($attr) {
		if (!in_array($this->$attr, ['hello', 'world'])) {
			$this->addError($attr, 'Сработал кастомный валидатор myRule, нужно указать либо hello либо world');
		}
	}

}*/

class TestForm extends ActiveRecord
{
	public static function tableName()
	{
		return 'articles';
	}

	//задание названий лейблов для инпутов формы
	public function attributeLabels()
	{
		return [
			'name' => 'Имя в модели',
			'email' => 'email в модели',
			'text' => 'Текстовое поле в модели',
		];
	}

	//валидация формы
	public function rules() {
		return [
			//можно по отдельности к каждому инпуту задавать правила валидации либо можно перечислить инпуты в массиве - [['name', 'email'], 'required'],
			['name', 'required', 'message' => 'Поле обязательно'],
			//валидалия на то что введен email
			['email', 'email'],
			['test', 'required'],
			['text', 'trim'],
		];
	}
}
