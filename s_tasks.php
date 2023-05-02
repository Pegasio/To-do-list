<?php
// Получаем данные из HTML-формы
$generalTask = $_POST['general_task'];
$subtasks = $_POST['subtasks'];

// Формируем строку для записи в файл
$fileContent = "+----+-------+----------------------------------------------------------------------+\n";
$fileContent .= "|           $generalTask          |\n";
$fileContent .= "+----+-------+----------------------------------------------------------------------+\n";
foreach ($subtasks as $index => $subtask) {
	$description = $subtask['description'];
	$hours = $subtask['hours'];
	$fileContent .= "| $index | $hours | $description\n";
}
$fileContent .= "+----+-------+----------------------------------------------------------------------+\n";

// Открываем файл для записи и записываем строку
$filename = 'tasks.txt';
$file = fopen($filename, 'a');
fwrite($file, $fileContent);
fclose($file);
?>