<?php
	error_reporting(0);
	include('DZ_products.php');

	if (isset($_GET['buy_item_add'])){ // после подтверждения наличия параметра buy_item с cart_add.php возвращается $_GET['buy_item_add'] - старт сессии.
		session_start();
	};	
	
	$user_cart = array_count_values($_SESSION['cart']); // вывод через функцию array_count_values() ассоциированного массива из $_SESSION. Ключ - номер товара, значение - сумма повторений.

?>

<!DOCTYPE html>
<html>
<head>
	<title>Выбор товара</title>
</head>
<body>
	<h2>Домашнее задание №7</h2>
	<h1>Выберите товар</h1>
	<form action=cart_add.php method=get>
		<table>
			<tr>
				<th>Название товара</th>
				<th>Цена</th>
				<th>Заказ</th>
			</tr>
			<tr>
				<?php
					for ($i=0; $i < count($products); $i++) { 
						echo "<tr>";
						echo "<td>".$products[$i]['title']."</td>";
						echo "<td>".$products[$i]['price_val']."</td>";
						echo "<td>"."<button type=\"submit\" name=\"buy_item\" value='$i'>Купить</button>"."</td>";
						echo "</tr>";
					}
				?>
			</tr>
		</table>
	</form>
	<?php
		if (is_array($user_cart)){
			echo "<h1>Корзина</h1>
				<table>
					<tr>
						<th>Название товара</th>
						<th>Количество</th>
						<th>Цена</th>
					</tr>";
						foreach ($user_cart as $key => $value) {
							echo "<tr>";
							echo "<td>".$products[$key]['title']."</td>";
							echo "<td>".$value."</td>";
							echo "<td>".$products[$key]['price_val']."</td>";
							echo "</tr>";
							$sum = $sum + $products[$key]['price_val']*$value;
							$sumVal = $sumVal + $value;
						};
							echo "Количество товаров: ".$sumVal.'<br>';
							echo "На сумму: ".$sum." грн";
		};
				?>
	</table>
</body>
</html>
