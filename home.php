<?php 
session_start();
include "connection.php";
$quid = $_GET['id'];
$_SESSION['quid'] = $quid;
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions WHERE id = '".$quid."'";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
			</div>
		</header>

		<main>
			<div class="container" style="display: block;">
				<h2>Привет!</h2>
				<p>Давай проверим твой уровень знаний</p>
				<ul>
				    <li><strong>Количество вопросов: </strong><?php echo $total; ?></li>
				    <li><strong>Очки: </strong>   &nbsp; +1 очко за каждый правильный ответ</li>
				</ul>
				<a href="question.php?n=1" class="start">Начать</a>
				<a href="exit.php" class="add">Выйти</a>

			</div>
		</main>
	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>