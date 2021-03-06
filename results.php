<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
		<title>Опросник PHP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
			</div>
		</header>

		<main>
			<div class= "container" style="display: block;">
			<h2>Поздравляем!</h2> 
				<p>Вы успешно выполнили тест!</p>
				<p>Ваши очки: <b><?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?></b> </p>
		<a href="question.php?n=1" class="start">Попробовать снова</a>
		<a href="home.php" class="start">Вернуться на главную</a>
		</div>
		</main>
		</body>
		</html>

		<?php 
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = @$_SERVER['REMOTE_ADDR'];
		 
		if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
		elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
		else $ip = $remote;
		 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score', ip = '$ip' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

