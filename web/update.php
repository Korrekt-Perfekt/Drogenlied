<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Изменить товар</title>
	<link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">

</head>
<body>

<?php
$products = simplexml_load_file('data/product.xml');

if(isset($_POST['submitSave'])) {

	foreach($products->product as $product){
		if($product['id']==$_POST['id']){
			$id = $product['id'];
			$category = $product['category'];
			$product->name = $_POST['name'];
			$product->sort = $_POST['sort'];
			$product->brewery = $_POST['brewery'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			if ($_FILES['image']['tmp_name']) {
				$name = $category . '-' . $id . '.' . end(explode('.', $_FILES['image']["name"]));
				file_put_contents("img/products/$name", file_get_contents($_FILES['image']["tmp_name"]));
				$product->image = "img/products/$name";
			}
			// if ($_FILES['model']['tmp_name']) {
			// 	$name = $category . '-' . $id . '.' . end(explode('.', $_FILES['model']["name"]));
			// 	file_put_contents("models/$name", file_get_contents($_FILES['model']["tmp_name"]));
			// 	$product->model = "models/$name";
			// }
			break;
		}
	}
	file_put_contents('data/product.xml', $products->asXML());
	header('location:list.php');
}

foreach($products->product as $product){
	if($product['id']==$_GET['id']){
		$id = $product['id'];
		$name = $product->name;
		$sort = $product->sort;
		$brewery = $product->brewery;
		$description = $product->description;
		$price = $product->price;
		$image = $product->image;
		// $model = $product->model;
		break;
	}
}
?>

<div class="container update-container">
	<p class="update-header">Изменение товара</з>
	<form method="post" enctype="multipart/form-data">
		<table class="update-table">
			<tr>
				<td class="table__td--texct-center">ID:</td>
				<td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></td>
			</tr>
			<tr>
				<td class="table__td--texct-center">Название:</td>
				<td><input required type="text" name="name" value="<?php echo htmlentities($name); ?>"></td>
			</tr>
			<tr>
				<td class="table__td--texct-center">Сорт:</td>
				<td><input required type="text" name="sort" value="<?php echo htmlentities($sort); ?>"></td>
			</tr>
			<tr>
				<td class="table__td--texct-center">Пивоварня:</td>
				<td><input required type="text" name="brewery" value="<?php echo htmlentities($brewery); ?>"></td>
			</tr>
			<tr>
				<td class="table__td--texct-center">Описание:</td>
				<td>
					<textarea name="description" name="text"><?php echo htmlentities($description); ?></textarea>
				</td>
			</tr>
			<tr>
				<td class="table__td--texct-center">Стоимость</td>
				<td><input required type="number" name="price" value="<?php echo $price; ?>"></td>
			</tr>
			 <?php 
				// if (!empty($model)) {
				// 	echo(
				// 		"<tr>
				// 			<td class=\"table__td--texct-center\">3D-модель:</td>
				// 			<td>Выбрана ($model)</td>
				// 		</tr>"
				// 	);
				// }
			?>
			<!--<tr>
				<td class="table__td--texct-center">Изменить 3D-модель:</td>
				<td><input type="file" name="model" accept=".glb"></td>
			</tr> -->
			<?php 
				if (!empty($image)) {
					echo(
						"<tr>
							<td class=\"table__td--texct-center\">Фото в каталоге:</td>
							<td><img src=\"$image\" class=\"update-image\"></td>
						</tr>"
					);
				}
			?>
			<tr>
				<td class="table__td--texct-center">Изменить фото:</td>
				<td><input type="file" name="image" accept="image/jpg, image/jpeg, image/png"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Сохранить" name="submitSave"></td>
			</tr>
		</table>
	</form>
	<a href="./list.php">Отмена</a>

</div>

</body>
</html>