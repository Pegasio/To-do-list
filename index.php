<!DOCTYPE html>
<html>

<head>
	<title>Создание задач</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<form method="post" action="s_tasks.php">
		<label>Название задачи</label>
		<div id="maintasks">
			<input type="text" placeholder="Название 1" name="general_task"><br><br>
		</div>
		<label>Список подзадач</label>
		<div id="subtasks">
			<div class="subtask">
				<input type="text" class="subDes" placeholder="Тут вводится подзадача" name="subtasks[0][description]">
				<input type="number" class="subHours" placeholder="Часы" name="subtasks[0][hours]">
				<button type="button" class="delete" onclick="removeSubtask(this)">Удалить</button>
			</div>
		</div>
		<button type="button" class="subtaskButton" onclick="addSubtask()">Добавить подзадачу</button><br>

		<button type="submit">Сохранить в Localstorage</button>
		<button type="button" onclick="createNewTask()">Создать новую задачу</button><br>

		<script>
			function addSubtask() {
				const subtasksDiv = document.getElementById('subtasks');
				const subtaskIndex = subtasksDiv.childElementCount;
				const newSubtaskDiv = document.createElement('div');
				newSubtaskDiv.classList.add('subtask');
				newSubtaskDiv.innerHTML = `
					  <input type="text" class="subDes" placeholder="Тут вводится подзадача" name="subtasks[${subtaskIndex}][description]">
					  <input type="number" class="subHours" placeholder="Часы" name="subtasks[${subtaskIndex}][hours]">
					  <button type="button" class="delete" onclick="removeSubtask(this)">Удалить</button>
				 `;
				subtasksDiv.appendChild(newSubtaskDiv);
			}

			function removeSubtask(button) {
				const subtaskDiv = button.closest('.subtask');
				subtaskDiv.remove();
			}

			function createNewTask() {
				const generalTaskInput = document.querySelector('input[name="general_task"]');
				const subtasksDiv = document.getElementById('subtasks');
				subtasksDiv.innerHTML = '';
				generalTaskInput.value = '';
				addSubtask();
			}
		</script>
	</form>
</body>

</html>