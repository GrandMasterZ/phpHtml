<?php require_once('connectToDb.php'); ?>
<?php require_once('functions.php'); ?>
<html>
<head>
<title> Book <?php echo $_GET['id'] ?> </title>
</head>
<body>
<?php
	$book = getOneBookData($_GET['id'],$conn);
	$row = mysqli_fetch_assoc($book);
	echo "Knygos pavadinimas: " . $row['title'] . "<br/>";
	echo "Isleidimo metai: " . $row['year'] . "<br/>";
	echo "Knygos autorius/autoriai: " . $row['authors'] . "<br/>";
	echo "Knygos zanras:" . $row['genre'] . "<br/>";
?>

</body>
</html>
