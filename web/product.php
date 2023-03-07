<?php
$products = simplexml_load_file('data/product.xml');
foreach($products->product as $product){
	if($product['id']==$_GET['id']){
		$id = $product['id'];
		$name = $product->name;
		$price = $product->price;
		$image = $product->image;
		$model = $product->model;
    $sort = $product->sort;
    $brewery = $product->brewery;
    $model = $product->model;
    if ($product->description) {
      $description = $product -> description;
    }
		break;
	}
}

if ($id == null) {
  header('location:404.html');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
  <div class="first-screen first-screen--product-page">
    <header class="header">
      <div class="container header__container">
        <a href="./index.php"><img class="header__logo" src="./img/Logo.svg" alt="logo"></a>
        <div class="header__icons">
          <a href="./plug.html"><img src="./img/favorites.svg" alt="favorites"></a>
          <a href="./plug.html"><img src="./img/shopping-cart.svg" alt="shopping-cart"></a>
        </div>
      </div>
    </header>


    <section class="item">
      <div class="container link-container">
        <a href="./index.php" class="item__link">На главную</a>
      </div>
      <div class="container item__container">
        <?php
          if (empty($model)) {
            if (empty($image)) {
              echo "<img src=\"./img/products/can-of-some-drink.jpg\" alt=\"фото\" class=\"item__image\">";
            } else {
              echo "<img src=\"$image\" alt=\"фото\" class=\"item__image\">";
            }
          } else {
            echo "<div id='canvas-container' data-path='$model'></div>";
          }
        ?>
        <div class="item__info">
          <h2 class="item__name"><?php echo $name ?></h2>
          <p><span class="item__attribute">Стоимость: </span><span class="item__price"><?php echo $price ?> ₽</span></p>
          <p><span class="item__attribute">Сорт: </span><span class="item__price"><?php echo $sort ?> </span></p>
          <p><span class="item__attribute">Пивоварня: </span><span class="item__price"><?php echo $brewery ?> </span></p>
          <p class="item__price"><span class="item__attribute">Описание: </span>
            <?php 
              if(empty($description)) {
                echo ("У данного продукта нет описания");
              } else {
                echo $description;
              } 
            ?>
            </p>
          <button class="product__button item__button">В корзину</button>
        </div>
      </div>
    </section>

    <section class="container" style="margin-bottom: 30px">
      <p>
        <span>Блок для администратора:</span>
        <a href="./list.php">перейти ко всем товарам</a> |
        <a href="update.php?id=<?php echo $id; ?>">Изменить</a> |
        <a href="list.php?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Вы уверены, что хотите удалить товар?')">Удалить</a>
      </p>
    </section>

    <footer class="footer" id="footer">
      <div class="container footer__container">
        <div class="footer__group">
          <span class="footer__header">Контактная информация:</span>
          <a href="tel:+49(89)-32-16-8" class="footer__text">+49(89)-32-16-8</a>
          <span class="footer__text">Wo Alle Straßen Enden</span>
        </div>
        <div class="footer__group">
          <span class="footer__header">Режим работы:</span>
          <span class="footer__text">Будние: 8:00-15:00</span>
          <span class="footer__text">Выходные: 24/7</span>
        </div>
        <div class="footer__group">
          <span class="footer__header">Мы в соц.сетях:</span>
          <a href="mailto:craft-beer@beer.ru" class="footer__text">Почта: craft-beer@beer.ru</a>
          <div class="social">
            <a href="https://vk.com/"><img src="./img/social/vk.svg" alt="vk.com"></a>
            <a href="https://instagram.com/"><img src="./img/social/inst.svg" alt=""></a>
            <a href="https://facebook.com/"><img src="./img/social/fb.svg" alt=""></a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/index.js"></script>
  <script type="module" src="./js/models.js"></script>

</body>
</html>