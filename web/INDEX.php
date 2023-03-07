<?php
   $products = simplexml_load_file('./data/product.xml'); 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width", initial-scale="1.0", maximum-scale="1.0", user-scalable="0">
        <link rel="stylesheet" href="Assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <title>Es regnet Bier</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        
        
    </head>
    <body>
        <div class="first-screen">
            <header class="header">
                <div class="container header__container">
                    <img src="./img/Logo.svg" alt="logo" class="header__logo">
                    <div class="header__icons">
                        <a href = "./plug.html">
                            <img src ="img/favorites.svg">
                        </a>
                        <a href = "./plug.html">
                            <img src ="./img/shopping-cart.svg">
                        </a>
                    </div>
                </div>
            </header>
            <div class="subheader">
                <ol class="container subheader__container">
                    <li>
                        <a class="subheader__link" href="">Пиво</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Сидр</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Мид</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Наборы</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Бокалы</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Скидки</a>
                    </li>
                    <li>
                        <a class="subheader__link" href="">Контакты</a>
                    </li>
                </ol>
            </div>
            <section class="banner">
                <div class="container banner__container">
                    <h1 class="banner__header">
                      По сути — <br>
                      вкусно!
                    </h1>
                  </div> 
            </section>
        </div>

        <section class="catalog">
            <div class="container catalog__container">
                <div class="category">
                    <h2 class="category__header">Пиво</h2>
                    <div class="products">
                        <?php
                            foreach($products->product as $product) {
                               if($product['category']=='beer'){ 
                                    $id = $product['id'];
                                    if (empty($product->image)) {
                                        $image = "./img/products/can-of-some-drink.jpg";
                                    } else {
                                        $image = $product->image;
                                    }

                                    echo("
                                    <div class=\"product\">
                                    <img src=\"$image\" alt=\"product\" class=\"product__image\">
                                    <div class=\"product__info\">
                                        <a href=\"./product.php?id=$id\" class=\"product__name\">$product->name</a>
                                        <div>
                                            <p>$product->sort</p>
                                            <p>$product->brewery</p>
                                        </div>
                                        <span class=\"product__price\">$product->price RUB</span>
                                        <button class=\"product__button\" class=\"product__button\">В корзину</button>    
                                    </div>
                                </div>
                                    ");
                                }
                            };
                        ?>
                        
                    </div>
                </div>

                <section class="billboards">
                    <div class="billboard">
                        <h2 class="billboard__header">Утопленник</h2>
                        <audio controls>
                            <source src="./sounds/Король и Шут - Утопленник.mp3" type="audio/mpeg">
                          </audio>
                        <p class="billboard">Эта песня Короля и шута повествует об алкогольной зависимости. Будьте осторожны, дабы не утопиться!</p>
                    </div>
                </section>

                <div class="container catalog__container">
                    <div class="category">
                        <h2 class="category__header">Сидр</h2>
                        <div class="products">
                        <?php
                            foreach($products->product as $product) {
                               if($product['category']=='cider'){ 
                                    $id = $product['id'];
                                    if (empty($product->image)) {
                                        $image = "./img/products/can-of-some-drink.jpg";
                                    } else {
                                        $image = $product->image;
                                    }

                                    echo("
                                    <div class=\"product\">
                                    <img src=\"$image\" alt=\"product\" class=\"product__image\">
                                    <div class=\"product__info\">
                                        <a href=\"./product.php?id=$id\" class=\"product__name\">$product->name</a>
                                        <div>
                                            <p>$product->sort</p>
                                            <p>$product->brewery</p>
                                        </div>
                                        <span class=\"product__price\">$product->price RUB</span>
                                        <button class=\"product__button\" class=\"product__button\">В корзину</button>    
                                    </div>
                                </div>
                                    ");
                                }
                            };
                        ?>
                              
                        </div>
                    </div>
                </div>

                <section class="billboards">
                    <div class="billboard">
                        <h2 class="billboard__header">Выпей с нами пива, парень. Не стесняйся, пей скорей!</h2>
                        <p class="billboard">И ты поверь, уж мы-то знаем толк в напитках. Пей скорей!</p>
                    </div>
                </section>

                <div class="container catalog__container">
                    <div class="category">
                        <h2 class="category__header">Мед</h2>
                        <div class="products">
                        <?php
                            foreach($products->product as $product) {
                               if($product['category']=='mead'){ 
                                    $id = $product['id'];
                                    if (empty($product->image)) {
                                        $image = "./img/products/can-of-some-drink.jpg";
                                    } else {
                                        $image = $product->image;
                                    }

                                    echo("
                                    <div class=\"product\">
                                    <img src=\"$image\" alt=\"product\" class=\"product__image\">
                                    <div class=\"product__info\">
                                        <a href=\"./product.php?id=$id\" class=\"product__name\">$product->name</a>
                                        <div>
                                            <p>$product->sort</p>
                                            <p>$product->brewery</p>
                                        </div>
                                        <span class=\"product__price\">$product->price RUB</span>
                                        <button class=\"product__button\" class=\"product__button\">В корзину</button>    
                                    </div>
                                </div>
                                    ");
                                }
                            };
                        ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <footer class="footer">
            <div class="container footer__container">
                <div class="footer__info">
                    <span class="footer__header">Контактная информация</span>
                    <a href="tel:+79100000" class="footer__text">+49(89)-32-16-8</a>
                    <span class="footer__text">Wo Alle Straßen Enden</span>
                </div>
                <!-- /.footer__info -->
                <div class="footer__info">
                    <span class="footer__header">Режим работы</span>
                    <span class="footer__text">Будние: 10:00-22:00</span>
                    <span class="footer__text">Выходные: отдыхаем</span>
                </div>
                <!-- /.footer__info -->
                <div class="footer__info">
                    <span class="footer__header">Социальные сети</span>
                    <a href="mailto: craftbeer@.ru" class="footer__text">craftbeer@mail.ru</a>
                    <div class="social">
                        <a href="" class="footer__link">
                            <img src="" alt="vk">
                        </a>
                        <a href="" class="footer__link">
                            <img src="" alt="inst">
                        </a>
                        <a href="" class="footer__link">
                            <img src="" alt="facebook">
                        </a>
                    </div>
                </div>
                    <!-- /.footer__info -->
            </div>
        <!-- /.container -->
        </footer>
        <!-- /.footer -->
        <script src="./js/index.js"></script>
    </body>
</html>