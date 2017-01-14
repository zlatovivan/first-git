<?php
	include('DZ_products.php');
	

	if (isset($_GET['buy_item'])) { // передача $_GET['buy_item'] старт сессии.
		session_start();
	};

	$_SESSION['cart'][]=$_GET['buy_item'];

//		session_destroy(); // для отладки
		 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	echo 'Товар '.$products[$_GET['buy_item']]['title'].' добавлен в Вашу корзину';
	?>
	<br>
	<form action="index.php">
	<button type="submit" name="buy_item_add" value='1'>Вернуться к покупкам</button>
	</form>
</body>
</html>