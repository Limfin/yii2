<h1>Show Action</h1>

<button class="btn btn-success" id="btn">Click me ...</button>

<!-- Подключение JS файлов для конкретно этой страницы -->
<?php
$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']); // @web - это алиас пути до папки web
?>
<!-- ---------------- -->

<!-- Добавление JS скриптов напрямую, аналогично записи <script></script>-->
<?php
$this->registerJs("$('.container').append('<p>SHOW напрямую!!!</p>');", \yii\web\View::POS_LOAD);
?>
<!-- ---------------- -->

<!-- налогичные методы используются для css файлов registerCss() и registerCssFile() -->
<?php
$this->registerCss('.container{background: #ccc}');
?>
<!-- ---------------- -->

<?php

$js = <<<JS
	$('#btn').on('click', function() {
		$.ajax({
			url: 'index.php?r=post/index',
			data: {test: '123'},
			type: 'GET',
			success: function(res) {
				console.log(res);
			},
			error: function() {
				alert('Error!');
			}
		});
	});
JS;

$this->registerJs($js);
?>