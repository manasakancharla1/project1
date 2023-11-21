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
    array('id' => 1,'price' => 12.00, 'image' => 'data:image/jpeg;base64,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', 'name' => 'Watering Can'),
    array('id' => 2, 'name' => 'Automatic Water' , 'Product 2', 'price' => 15.00, 'image' => 'https://m.media-amazon.com/images/I/81Lo77J87JL._AC_UF1000,1000_QL80_.jpg'),
    array('id' => 3, 'name' => 'Stands', 'price' => 23.00, 'image' => 'https://m.media-amazon.com/images/I/51OjAPY4h+L._AC_SR300,300.jpg'),
    array('id' => 4, 'name' => 'Hashtip', 'price' => 12.00, 'image' => 'https://rukminim2.flixcart.com/image/850/1000/xif0q/plant-straightener/r/x/q/15-15pcs-plant-straightener-plant-support-sticks-accessories-original-imagkx7judxkyvvz.jpeg?q=20'),
    array('id' => 5, 'name' => 'Candle', 'price' => 25.00, 'image' => 'https://static.wixstatic.com/media/f29183_b4c90be235a643ebbed96a299fc81c6d~mv2.jpg/v1/fill/w_240,h_240,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/f29183_b4c90be235a643ebbed96a299fc81c6d~mv2.jpg'),
    array('id' => 6, 'name' => 'Hand Cultivator', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-3-prong-hand-cultivator-no-mmi-84-gardening-tool-723645_222x295.jpg?v=1679748515'),
    array('id' => 7, 'name' => 'Hand Trovel', 'price' => 10.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-plastic-hand-trowel-no-1021-gardening-tool-1-246386_195x260.jpg?v=1679750932'),
    array('id' => 8, 'name' => 'Moss Stick', 'price' => 14.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gardening-accessories-moss-stick-2-feet-16969035972748_260x260.jpg?v=1634224467'),
    array('id' => 9, 'name' => 'Plastic HC', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-plastic-hand-cultivator-no-1019-gardening-tool-1-432788_195x260.jpg?v=1679750932'),
    array('id' => 10, 'name' => '2ft coir pole', 'price' => 5.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gardening-accessories-2ft-coir-pole-1-535826_260x260.jpg?v=1679748300'),
    array('id' => 11, 'name' => '3ft coir pole', 'price' => 18.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gardening-accessories-3ft-coir-pole-1-713438_260x260.jpg?v=1679748351'),
    array('id' => 12, 'name' => 'Aluminium Wire', 'price' => 20.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-anodised-aluminium-wire-2-mm-33-ft-10-m-for-bonsai-training_260x260.jpg?v=1634213359'),
    array('id' => 13, 'name' => 'Hand fork', 'price' => 32.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-plastic-hand-fork-no-1020-gardening-tool-1-558958_195x260.jpg?v=1679750932'),
    array('id' => 14, 'name' => 'Fence', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-miniature-garden-toys-wooden-fence-miniature-garden-toys-sky-blue-4-pieces-16969434169484_260x260.png?v=1601351637'),
    array('id' => 15, 'name' => 'Coir Muluch mat', 'price' => 19.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-gardening-accessories-6inch-15-cm-coir-mulch-mat-16968523481228_260x260.jpg?v=1634210050'),
    array('id' => 16, 'name' => 'Degging spade', 'price' => 28.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-digging-spade-no-1086-gardening-tool-1-290551_195x260.jpg?v=1679749860'),
    array('id' => 17, 'name' => 'Trowel', 'price' => 23.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-transplanting-trowel-no-mmi-83-gardening-tool-1-594831_195x260.jpg?v=1679751836'),
    array('id' => 18, 'name' => 'Steel Handle ', 'price' => 13.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-2-inch-5-cm-khurpa-steel-handle-with-grip-no-mmi-88-gardening-tool-1-320602_195x260.jpg?v=1679748230'),
    array('id' => 19, 'name' => 'Sprayer', 'price' => 8.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pressure-sprayer-1-5-ltr-gardening-tool-1-275834_195x260.jpg?v=1679750984'),
    array('id' => 20, 'name' => 'Fork Plain', 'price' => 18.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-hand-fork-plain-no-1004-gardening-tool-1-295376_512x683.jpg?v=1679750239'),
    array('id' => 21, 'name' => 'tUB POT', 'price' => 10.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-garden-hoe-trowel-with-handle-no-mmi-94-gardening-tool-1-508917_512x683.jpg?v=1679750046'),
    array('id' => 22, 'name' => 'Hoe trowel', 'price' => 33.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/w/h/494x544/white-iron-hand-cart-shaped-planter-stand-by-gig-handicrafts-white-iron-hand-cart-shaped-planter-sta-ffyedk.jpg'),
    array('id' => 23, 'name' => 'Moss Stones', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-miniature-garden-toys-moss-stones-plastic-miniature-garden-toys-4-pieces-16969036497036_512x512.jpg?v=1634224471'),
    array('id' => 24, 'name' => 'Wind Mills', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-miniature-garden-toys-windmills-plastic-miniature-garden-toys-2-pieces-16969427255436_512x512.jpg?v=1634231047'),
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

<h2>Accessories</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="accessories.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>
<p style="text-align: center;justify-items:center;font-weight:bold;color:white;margin-right:100px;font-size:30px">About Accessories</p>
<p style="color:orange">
The word 'garden' comes from the Latin word meaning 'back garden', while 'back' refers to the root of a plant as in the case of a vine.<br><br>


And the gardening accessories or tools are amongst several instruments explicitly made for horticulture and agriculture, well-classified into 'power tools' and 'hand tools'.<br><br>


About Gardening Accessories:


The most common garden accessory used by gardeners is the hoe, which is a broad-toothed gardening tool whose primary function is to dig and excavate the soil. The 'gardener's pick', or fork, is another useful tool, used to plant seedlings and take care of them during the growing season. To control weeds and grow healthy plants, gardeners use a trimmer, a small tool that has a narrow blade used to shred leaves, stems and even roots of plants.<br><br>

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