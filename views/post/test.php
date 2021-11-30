<?php
// подключение виджетов для формы
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Test Action</h1>

<?php
//<---- вызов функции записанной в контроллере PostContrller.php внутри вида
// use function app\controllers\debug;
// debug($names);
//------------------->

//<---- вызов функции записанной в файле fucntions.php, где добавлены кастомные функции
debug($names);
//------------------->
?>

<!-- Форма -->
<?php $form = ActiveForm::begin(['options' => ['id' => 'test_form', 'class' => 'form-horizontal']]) ?>

<!-- Инпут с кастомным классом для подсказки(hint) -->
<?= $form->field($model, 'name')->label('Имя')->hint('Подсказка(hint) к полю', ['class'=>'form-hint']) ?>
<!----------------------------->

<!-- Инпут с кастомным классом -->
<?= $form->field($model, 'email')->input('email',['class'=>'form-control text-center']) ?>
<!----------------------------->

<?= $form->field($model, 'test')->label('Тестовое поле') ?>

<!-- Инпут с кастомным шаблоном("{label}\n{input}\n{hint}") и кастомным классом для инпута -->
<?= $form->field($model, 'text', ['template' => "{label}\n{input}\n{hint}"])->label('Текст сообщения')->textarea(['rows' => 5]) ?>
<!----------------------------->
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<!----------------------------->

