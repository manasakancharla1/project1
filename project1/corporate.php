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
    array('id' => 1,'price' => 110.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-birthday-wishes-with-peace-lily-plant-1-231600_195x260.jpg?v=1679749247', 'name' => 'Peace Lilly'),
    array('id' => 2, 'name' => 'Money Plant' , 'Product 2', 'price' => 158.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-birthday-special-money-plant-1-734884_195x260.jpg?v=1679749247'),
    array('id' => 3, 'name' => 'Peace Lilly', 'price' => 232.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gifts-wish-happy-diwali-with-peace-lily-and-greeting-card-16969428828300_260x260.jpg?v=1634231095'),
    array('id' => 4, 'name' => 'Kalanchoe', 'price' => 122.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-amazing-kalanchoe-for-anniversary-1-228133_195x260.jpg?v=1679749045'),
    array('id' => 5, 'name' => 'Philodendron', 'price' => 252.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-philodendron-for-gemini-or-mithun-rashi-plant-1-546153_195x260.jpg?v=1679750874'),
    array('id' => 6, 'name' => 'Air purify Plant', 'price' => 158.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-happy-anniversary-with-air-purifier-plants-1-139771_195x260.jpg?v=1679750242'),
    array('id' => 7, 'name' => 'Pink Ixora', 'price' => 104.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Concrete-pot.jpg'),
    array('id' => 8, 'name' => 'Haworthia', 'price' => 143.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-haworthia-for-aries-or-mesha-rashi-plant-1-160581_195x260.jpg?v=1679750242'),
    array('id' => 9, 'name' => 'Sansevieria', 'price' => 251.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-celebrate-friendship-with-sansevieria-and-a-flag-1-958366_195x260.jpg?v=1679749480'),
    array('id' => 10, 'name' => 'Lipstick Plant', 'price' => 56.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-aglaonema-lipstick-plant-gift-pack-16968576401548_260x260.jpg?v=1634212447'),
    array('id' => 11, 'name' => 'Plant in mug', 'price' => 188.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-feng-shui-money-plant-in-a-mug-for-lovely-mother-1-881542_195x260.jpg?v=1679750031'),
    array('id' => 12, 'name' => 'Splendid succlents', 'price' => 20.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-splendid-succulents-gift-pack-16969345400972_260x260.jpg?v=1634229202'),
    array('id' => 13, 'name' => 'Bamboo', 'price' => 325.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-2-layer-lucky-bamboo-gift-pack-16968447754380_260x260.jpg?v=1634207077'),
    array('id' => 14, 'name' => 'Garden Kit', 'price' => 230.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-pleasant-vinca-seeds-garden-kit-gift-pack-16969210953868_260x260.jpg?v=1634226319'),
    array('id' => 15, 'name' => 'Paper Wrap', 'price' => 150.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-money-plant-marble-prince-in-paper-wrap-gift-pack-16969031909516_260x260.jpg?v=1634224214'),
    array('id' => 16, 'name' => 'Jade Plant', 'price' => 280.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-elephant-bush-jade-plant-gift-pack-16968841035916_260x260.jpg?v=1634219858'),
    array('id' => 17, 'name' => 'Jade in handi', 'price' => 230.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-elephant-bush-jade-plant-in-handi-gift-pack-16968841461900_512x512.jpg?v=1634219867'),
    array('id' => 18, 'name' => 'ZZ plant ', 'price' => 190.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-zamioculcas-zamiifolia-zz-plant-gift-pack-16968796700812_512x512.jpg?v=1634231733'),
    array('id' => 19, 'name' => 'Ficus Bonsai', 'price' => 8.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-bulk-gifts-fabulous-ficus-bonsai-gift-pack-16968853717132_512x512.jpg?v=1634219321'),
    array('id' => 20, 'name' => 'Rubber plant', 'price' => 18.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-rubber-plant-for-virgo-or-kanya-rashi-plant-2-765008_512x683.jpg?v=1679751051'),
    array('id' => 21, 'name' => 'Valantines', 'price' => 10.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-valentines-special-2-loving-hearts-image_512x512.jpg?v=1634230701'),
    array('id' => 22, 'name' => 'Peperomia', 'price' => 33.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-peperomia-for-libra-or-tula-rashi-plant-1-734063_512x683.jpg?v=1679750813'),
    array('id' => 23, 'name' => 'Jade and Buddha ', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-g-spread-luck-and-happiness-with-jade-plant-and-buddha-270158_260x260.jpg?v=1679751741'),
    array('id' => 24, 'name' => 'Roses', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gifts-lovely-money-plant-with-ferrero-rocher-roses-16969011069068_260x260.jpg?v=1634223415'),
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

<h2>Coporate</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="corporate.php">
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