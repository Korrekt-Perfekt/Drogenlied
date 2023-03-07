<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Создать товар</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php
        if(isset($_POST['submitSave'])){
            $id = uniqid();
            $products = simplexml_load_file('./data/product.xml');
            $product = $products -> addChild('product');

            if($_FILES['image']['tmp_name']){
                $name = $_POST['category'] . '-' . $id . '.' . end(explode('.', $_FILES['image']["name"]));
                file_put_contents("img/products/$name", file_get_contents($_FILES['image']['tmp_name']));
                $product->addChild('image', "img/products/$name");
            }

            $product->addAttribute('id', $id);
            $product->addAttribute('category', $_POST['category']);
            
            $product -> addChild('sort', $_POST['sort']);
            $product -> addChild('brewery', $_POST['brewery']);

            if (!empty($_POST['description'])) {
                $product -> addChild('description',$_POST['description']);
            }

            $product -> addChild('name', $_POST['name']);
            $product -> addChild('price', $_POST['price']);


            file_put_contents('data/product.xml', $products->asXML());
            header('location:list.php');
        }
    ?>

    <div class="container create-container">
        <p class="create-header">Создание товара</p>
            <form method="post" enctype="multipart/form-data">
                <table class="create-table">
                    <tr>
                        <td class="table__td--texct-center">Категория:</td>
                        <td>
                        <select name="category">
                            <option value="beer">Пиво</option>
                            <option value="cider">Сидр</option>
                            <option value="mead">Мид</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__td--texct-center">Название:</td>
                        <td><input required type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td class="table__td--texct-center">Сорт:</td>
                        <td><input required type="text" name="sort"></td>
                    </tr>
                    <tr>
                        <td class="table__td--texct-center">Пивоварня:</td>
                        <td><input required type="text" name="brewery"></td>
                    </tr>
                    <tr>
                        <td class="table__td--texct-center">Описание:</td>
                        <td><textarea name="description"></textarea></td>
                    </tr>
                    <tr>
                        <td class="table__td--texct-center">Стоимость:</td>
                        <td><input required type="number" name="price"></td>
                    </tr>
                    <!-- <tr>
                        <td class="table__td--texct-center">3D-модель:</td>
                        <td><input type="file" name="model" accept=".glb"></td>
                    </tr> -->
                    <tr>
                        <td class="table__td--texct-center">Фото:</td>
                        <td><input type="file" name="image" accept="image/jpg, image/jpeg, image/png"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Создать" name="submitSave"></td>
                    </tr>
                </table>
            </form>

            <a href="./list.php">Отмена</a>

	</div>
</body>
</html>