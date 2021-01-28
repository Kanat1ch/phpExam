<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>Опросник PHP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
				<div class="buttons">
					<a href="index.php" class="start">Главная</a>
					<a href="add_quiz.php" class="start">Новый опрос</a>
					<a href="allquiz.php" class="start">Все опросы</a>
					<a href="players.php" class="start">Участники</a>
					<a href="exit.php" class="start">Выйти</a>
				</div>
			</div>
		</header>

		<main>
			<div class="container" style="margin-top: 30px;">
				<h2>Добро пожаловать, Админ!</h2>
				</div>
				</main>
				</body>
				</html>

				<?php } 
				else {
				header("location: admin.php");
				}
				?>