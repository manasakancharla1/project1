<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add an item to the cart
function addToCart($item_id, $item_name, $item_price, $item_image, $quantity) {
    // Check if the item is already in the cart
    $item_key = array_search($item_id, array_column($_SESSION['cart'], 'id'));

    if ($item_key !== false) {
        // Update the quantity if the item is already in the cart
        $_SESSION['cart'][$item_key]['quantity'] += $quantity;
    } else {
        // Add the item to the cart
        $_SESSION['cart'][] = array(
            'id' => $item_id,
            'name' => $item_name,
            'price' => $item_price,
            'image' => $item_image,
            'quantity' => $quantity,
        );
    }
}
// Product data (you can replace this with data from your database)
$products = array(
    array('id' => 1,'price' => 15.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/hgtv/fullset/2018/4/2/0/CI_ColorBlends-Blue-Hyacinth.JPG.rend.hgtvcom.966.644.suffix/1522671815803.jpeg', 'name' => 'Tulips'),
    array('id' => 2, 'name' => 'Reticulated Iris' , 'Product 2', 'price' => 19.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2012/8/20/0/2095_038.jpg.rend.hgtvcom.616.822.suffix/1452734429477.jpeg'),
    array('id' => 3, 'name' => 'February Gold ', 'price' => 12.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/hgtv/fullset/2015/11/11/4/CI_Colorblends-Narcissus-February-Gold.jpg.rend.hgtvcom.966.725.suffix/1447257877758.jpeg'),
    array('id' => 4, 'name' => 'Wood sarel', 'price' => 12.00, 'image' => 'https://garden.org/pics/2013-01-07/plantladylin/c75a90-250.jpg'),
    array('id' => 5, 'name' => 'Siberian Squill', 'price' => 19.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2012/8/20/0/2018_041.jpg.rend.hgtvcom.966.725.suffix/1452733375963.jpeg'),
    array('id' => 6, 'name' => 'Daffodil ', 'price' => 15.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2013/5/22/0/130418-hgtvgardens-asheville-0041.jpg.rend.hgtvcom.616.822.suffix/1452646917990.jpeg'),
    array('id' => 7, 'name' => 'Crown Imperial  ', 'price' => 10.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2013/8/5/0/frit-imperialis-tall-orange.jpg.rend.hgtvcom.966.644.suffix/1452661951993.jpeg'),
    array('id' => 8, 'name' => 'Globe Master', 'price' => 20.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2013/9/26/0/CI_ci-dig-drop-done-alliums-globlemasters-21924.jpg.rend.hgtvcom.616.822.suffix/1452662605953.jpeg'),
    array('id' => 9, 'name' => 'Martagon Lily ', 'price' => 15.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/hgtv/stock/2018/1/25/0/shutterstock_698601844_martagon-lily.jpg.rend.hgtvcom.966.644.suffix/1516909186984.jpeg'),
    array('id' => 10, 'name' => 'Lily Allen', 'price' => 15.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2014/5/29/0/Original_original-photog-types-of-lilies-17.jpg.rend.hgtvcom.966.644.suffix/1452854584171.jpeg'),
    array('id' => 11, 'name' => 'Stargazer', 'price' => 18.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/hgtv/stock/2018/1/25/0/shutterstock_254229487_lilium-stargazer.jpg.rend.hgtvcom.966.644.suffix/1516909186721.jpeg'),
    array('id' => 12, 'name' => 'Sunshine', 'price' => 20.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2013/6/13/0/CI_calla-zantedeschia-sunshine.jpg.rend.hgtvcom.616.822.suffix/1452644594627.jpeg'),
    array('id' => 13, 'name' => 'Blue Storm Lily', 'price' => 32.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2014/4/8/0/blue-storm-agapanthus.jpg.rend.hgtvcom.966.725.suffix/1452647513155.jpeg'),
    array('id' => 14, 'name' => 'Dahlia hybrids', 'price' => 25.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2013/4/15/0/CI_ci-dahlia-lynch-creek-farm.jpg.rend.hgtvcom.966.725.suffix/1452753535374.jpeg'),
    array('id' => 15, 'name' => 'Rubrum', 'price' => 19.00, 'image' => 'https://hgtvhome.sndimg.com/content/dam/images/hgtv/stock/2018/1/25/0/shutterstock_366731504_lilium-speciosum-rubrum.jpg.rend.hgtvcom.616.822.suffix/1516909185703.jpeg'),
    array('id' => 16, 'name' => 'Checkered Lily', 'price' => 28.00, 'image' => 'https://garden.org/pics/2014-03-28/Patty/86faaf-250.jpg'),
    array('id' => 17, 'name' => 'Snowdrop ', 'price' => 23.00, 'image' => 'https://garden.org/pics/2011-09-26/bonitin/5312c2-250.jpg'),
    array('id' => 18, 'name' => 'Species Tulip ', 'price' => 13.00, 'image' => 'https://garden.org/pics/2014-08-31/growitall/f17420-250.jpg'),
    array('id' => 19, 'name' => 'Aztec Lilly', 'price' => 28.00, 'image' => 'https://garden.org/pics/2011-10-27/valleylynn/24b340-250.jpg'),
    array('id' => 20, 'name' => 'Star Flower', 'price' => 18.00, 'image' => 'https://garden.org/pics/2014-04-09/dirtdorphins/258db2-250.jpg'),
    array('id' => 21, 'name' => 'Wind Flower ', 'price' => 10.00, 'image' => 'https://garden.org/pics/2015-03-27/Marilyn/f0cf36-250.jpg'),
    array('id' => 22, 'name' => 'Amaryllius', 'price' => 13.00, 'image' => 'https://garden.org/pics/2011-12-30/GoneTropical/4ffc26-250.jpg'),
    array('id' => 23, 'name' => 'Blue Bell', 'price' => 25.00, 'image' => 'https://garden.org/pics/2011-12-14/JRsbugs/e6a2c0-250.jpg'),
    array('id' => 24, 'name' => 'Rain Lilly', 'price' => 15.00, 'image' => 'https://garden.org/pics/2014-10-17/CaliFlowers/a5fd5e-250.jpg'),
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
     body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            background-image: url('https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?cs=srgb&dl=pexels-pixabay-531880.jpg&fm=jpg');
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: green;
            font-size: 50px;
            font-weight: bolder;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .product {
           width: 150px;
           height:300px;
            border: 1px solid #ddd;
            padding: 5px;
            margin: 5px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .product:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .product img {
            max-width: 100%;
            height: 100px;
            margin-bottom: 0px;
        }

        .product h3 {
            color: #333;
        }

        .product p {
            color: #888;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="number"] {
            width: 50px;
            margin-bottom: 10px;
            padding: 5px;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        button {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            font-weight: bold;
            width: 1470px;
            height: 50px;
            background-color: orangered;
            border: none;
            justify-items: center;
            border-radius: 10px;
            cursor: pointer;

        }
        button:hover {
            background-color: #45a049;
        }
        .like-icon {
            font-size: 1.0em;
            color: #3498db;
            cursor: pointer;
        }

        .like-icon:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>

<h2>Bulbs</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="product_list3.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>

<!-- Add a link to the cart page -->
&ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;<a href="cart.php"><button>View Cart</button></a>


</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Find the selected product in the products array
    $selected_product = array_reduce($products, function ($carry, $product) use ($item_id) {
        return ($product['id'] == $item_id) ? $product : $carry;
    });

    // Add the selected product to the cart
    if ($selected_product) {
        addToCart($selected_product['id'], $selected_product['name'], $selected_product['price'], $selected_product['image'], $quantity);
    }
}
?>