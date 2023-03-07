<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог сайта</title>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        if (isset($_GET['action'])) {
            $products = simplexml_load_file('data/product.xml');

            $id = $_GET['id'];

            $index = null;
            $i = 0;

            foreach($products->product as $product){
                if($product['id']==$id){
                    $index = $i;
                    break;
                }
                $i++;
            }
            if ($index != null) {
                unset($products->product[$index]);
            }
            file_put_contents('data/product.xml', $products->asXML());
        };

        $products = simplexml_load_file('./data/product.xml');
        echo "<p class=\"container list-container\">Всего товаров в каталоге: ".count($products)."</p>";
    ?>

    <div class="container">
        <a class = 'list-links' href='create.php'> Добавить новый товар</a>
        <a class = 'list-links' href='index.php'> Вернуться на главную</a>
    </div>
    <div class="container">
        <table class = "list-table">
            <tr class="list-table__head">
                <th>id</th>
                <th>Название</th>
                <th>Стоимость</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
            <?php
                foreach($products -> product as $product) { ?>
                <tr class = "list-table__tr">
                    <th class="list-table__td table__td--text-center"><?php echo $product['id'];?></th>
                    <th class="list-table__td table__td--text-center">
                    <a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product->name; ?></a></th>
                    <th class="list-table__td table__td--text-center"><?php echo $product -> price;?></th>
                    <th class="list-table__td table__td--text-center"><?php echo $product -> description;?></th>
                    <th>
                        <a href='update.php?id=<?php echo $product['id']?>'>изменить</a>
                        <a href='list.php?action=delete&id=<?php echo $product['id']; ?>'
                        onclick="return confirm('Вы уверены, что хотите удалить товар?')">
                        удалить</a>
                    </th>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>