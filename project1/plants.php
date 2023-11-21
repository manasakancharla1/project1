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
    array('id' => 1,'price' => 12.00, 'image' => 'https://www.realsimple.com/thmb/geEggOU9ZKH-5HNBB0gj4sUsD_k=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/aloe-vera-plant-in-white-flowerpot-912168376-b3e0851cc4134bcdbbce0a803d108d0f.jpg', 'name' => 'Alovera'),
    array('id' => 2, 'name' => 'Golden Pothos' , 'Product 2', 'price' => 15.00, 'image' => 'https://www.realsimple.com/thmb/3bcmiCErzoSzF18GB_dyCMlgllk=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/golden-pothos-0843228a1a1b46f3a20285f6ce65a578.jpg'),
    array('id' => 3, 'name' => 'Moth Orchid ', 'price' => 23.00, 'image' => 'https://www.realsimple.com/thmb/K8WaqtdxDUNk65V9GbFDJU4jMwM=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/phalaenopsis-cultivar--moth-orchid-529784720-5b42c09446e0fb0037bc926c.jpg'),
    array('id' => 4, 'name' => 'Basil', 'price' => 12.00, 'image' => 'https://www.realsimple.com/thmb/llxJAGPg29vTWOR61g_fJ8jVh3A=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-106007388-cc9916095acb4c5caec7b3f62fc7796b.jpg'),
    array('id' => 5, 'name' => 'African Violet', 'price' => 25.00, 'image' => 'https://www.realsimple.com/thmb/2j1Cw6MhG9Pyt8CQt0Vt9g_D_GI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-180437873-3f268cfb4ae741b393fdd5ef5ea946bf.jpg'),
    array('id' => 6, 'name' => 'Jade plant', 'price' => 15.00, 'image' => 'https://www.realsimple.com/thmb/4tfX7XK4oXfZGt0aHV36tWdZdAA=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/jade-plant-1255395975-c460cc612ea5431d93855bf492c2690f.jpg'),
    array('id' => 7, 'name' => 'Spider plant', 'price' => 10.00, 'image' => 'https://www.realsimple.com/thmb/THetAAWbGQwxbIIwdkjBz9REAO4=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/gi-plants-spider-plant-58b9767b5f9b58af5c490b07.jpg'),
    array('id' => 8, 'name' => 'Rubber plant', 'price' => 14.00, 'image' => 'https://www.realsimple.com/thmb/GMaMQtqL5fIml7WrvZ471_byD3M=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Rubber-plant-GettyImages-829464-001-58aa2f3e5f9b58a3c9abba32.jpg'),
    array('id' => 9, 'name' => 'Dumb Cane Plant', 'price' => 25.00, 'image' => 'https://www.realsimple.com/thmb/qSCWDWwmn_oR_icdnacX9XKjEN8=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-680536352-792b3cbbcd064892b50037c1a4848c8e.jpg'),
    array('id' => 10, 'name' => 'Rose mary', 'price' => 5.00, 'image' => 'https://www.realsimple.com/thmb/MSx8MUW7GL48lS4eWUcto7mjank=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/rosemary-0f45fba883f144d19c5859443d58303c.jpg'),
    array('id' => 11, 'name' => 'Money Tree', 'price' => 18.00, 'image' => 'https://www.realsimple.com/thmb/zPu0WD2x4VPIknD4F7HW5xBICAw=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-1345463551-4ab50ed56e9c433c9d6571d7e51707cf.jpg'),
    array('id' => 12, 'name' => 'ZZ plant', 'price' => 20.00, 'image' => 'https://www.realsimple.com/thmb/PAvYKb_gyLfdmOG6qm0g6x19yXM=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/zz-plant-823642fbcd9947d298a03a48f7543fb1.jpg'),
    array('id' => 13, 'name' => 'Areca Palms', 'price' => 32.00, 'image' => 'https://www.realsimple.com/thmb/v4kCiS4v3RCmDOaGU3f15wfL7WY=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-988625944-5c827e364cedfd000190b14b.jpg'),
    array('id' => 14, 'name' => 'Bromeliads', 'price' => 25.00, 'image' => 'https://www.realsimple.com/thmb/o4xHER1452qn3qYgvhhKNcOhpOI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/bromeliad-indoors-950489120-fab1e3c5a0bd42d7a11e80720552acb2.jpg'),
    array('id' => 15, 'name' => 'Dragon tree', 'price' => 19.00, 'image' => 'https://www.realsimple.com/thmb/rb19V0eUDGlX9bGbY0qT9kSe7oA=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/dragontree-28e2c017f4374613814310d8683ceae1.jpg'),
    array('id' => 16, 'name' => 'Croton', 'price' => 28.00, 'image' => 'https://www.realsimple.com/thmb/5ycsoHz2iuOGToSCzSUq5q8Sekk=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/difficult-house-plant-croton-c70940d3ff2e47baa26983ffb9a4d58c.jpg'),
    array('id' => 17, 'name' => 'Chinese Evergreen', 'price' => 23.00, 'image' => 'https://www.realsimple.com/thmb/OuCqfmsadcO8eGwQ77FV7xI9XsE=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/aglaonema-chinese-evergreen-green-b9cbce3643dc4224befe57a3846a043e.jpg'),
    array('id' => 18, 'name' => 'Oyster Plant ', 'price' => 13.00, 'image' => 'https://www.realsimple.com/thmb/2nv8o3yegU7sxAPFEOWsZu3NJJI=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/oyster-plant-a7279b8555bc455e82a1925e01d8232e.jpg'),
    array('id' => 19, 'name' => 'Kalanchoe', 'price' => 8.00, 'image' => 'https://www.realsimple.com/thmb/V9_cXQy5BUoDbw41Cvit-7h0W4c=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/Kalanchoe-GettyImages-150096970-58d537e63df78c51622bbb6f.jpg'),
    array('id' => 20, 'name' => 'Jasmine plant', 'price' => 18.00, 'image' => 'https://www.realsimple.com/thmb/8G8X_MvIt7bYoQbJgBayQFgTCK0=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-492629029-a4ae1d64f2ba4175a3e6a4e5db37eef0.jpg'),
    array('id' => 21, 'name' => 'Cacutus', 'price' => 10.00, 'image' => 'https://www.realsimple.com/thmb/QviNv2coknoXm9x29Ct9wUFoi58=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-1079709526-BunnyEarCactus-OpuntiaMicrodasys-2496e8598e9c42d4a75b5af3581848d7.jpg'),
    array('id' => 22, 'name' => 'Homalomena Selby', 'price' => 33.00, 'image' => 'https://www.realsimple.com/thmb/9wMJix7HvFZjQXvQ1BsyPlgEE6A=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/selby-plant-047b316673564318b0498ad1c318ebc1.png'),
    array('id' => 23, 'name' => 'Parijth tree', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nl-parijat-plant_295x295.jpg?v=1669193790'),
    array('id' => 24, 'name' => 'Elephant bush', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-plant-elephant-bush-portulacaria-afra-jade-green-plant-in-4.5-inch-11-cm-ronda-No-1110-round-plastic-green-planter-1-629198_222x295.jpg?v=1679749890'),
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

<h2>Plants</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="plants.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>
<p style="text-align: center;justify-items:center;font-weight:bold;color:white;margin-right:100px;font-size:30px">
About Plants
</p>
<p style="color:orange">
Plants are everywhere, but did you know that they have a lot more to offer than just pretty flowers? These green wonders are essential to our survival, and they have some seriously cool tricks up their sleeves.<br><br>

From purifying the air to healing our bodies, plants are the ultimate multitaskers.<br><br>

So, let's dive into the world of plants in this witty listicle format, and see what these botanical beauties are all about.
</p>

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