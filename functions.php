<?php

//функция доступная в видах, перенесена из файла AppController.php
function debug($arr)
{
	echo '<pre>' . print_r($arr, true) . '</pre>';
}