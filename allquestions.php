<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	$quid = $_GET['id'];
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

		
	<h1>Все опросы</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th># Вопроса</th>
				<th>Вопрос</th>
				<th>Вариант 1</th>
				<th>Вариант 2</th>
				<th>Вариант 3</th>
				<th>Вариант 4</th>
				<th>Ответ (a-d/1-4)</th>
				<th>Изменить</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions WHERE id ='".$quid."'";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Изменить </a></td>";
				echo "<td><a href='deletequestion.php?qno=$qno'> Удалить </a></td>";
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>


