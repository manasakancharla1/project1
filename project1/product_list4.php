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
    array('id' => 1,'price' => 12.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Coir-Pot.jpg', 'name' => 'Coir'),
    array('id' => 2, 'name' => 'Ceramic' , 'Product 2', 'price' => 15.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Ceramic-pot.jpg'),
    array('id' => 3, 'name' => 'Terracotta', 'price' => 23.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Terracotta-pot.jpg'),
    array('id' => 4, 'name' => 'plastic', 'price' => 12.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Plastic-pot.jpg'),
    array('id' => 5, 'name' => 'Wood', 'price' => 25.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/wood-pot.jpg'),
    array('id' => 6, 'name' => 'Metal', 'price' => 15.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Metal-pot.jpg'),
    array('id' => 7, 'name' => 'Concrete', 'price' => 10.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Concrete-pot.jpg'),
    array('id' => 8, 'name' => 'Stone Pots', 'price' => 14.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/stone-pot.jpg'),
    array('id' => 9, 'name' => 'Basket', 'price' => 25.00, 'image' => 'https://stylesatlife.com/wp-content/uploads/2020/02/Basket-pot-1.jpg'),
    array('id' => 10, 'name' => 'Bottle pots', 'price' => 5.00, 'image' => 'https://i.pinimg.com/564x/a6/26/67/a626675a87e264ae4fb91f39f01b88fa.jpg'),
    array('id' => 11, 'name' => 'Designed Pots', 'price' => 18.00, 'image' => 'https://i.pinimg.com/564x/79/66/ac/7966acdb3d113e385572098d690bf7b6.jpg'),
    array('id' => 12, 'name' => 'Hanging pot', 'price' => 20.00, 'image' => 'https://i.pinimg.com/564x/84/9d/6a/849d6a030df41a2c2e07461778e5f0c7.jpg'),
    array('id' => 13, 'name' => 'DIY Planters', 'price' => 32.00, 'image' => 'https://i.pinimg.com/564x/09/55/85/0955854cd6ce9d620b0a3fb2dc82bced.jpg'),
    array('id' => 14, 'name' => 'Rock Pots', 'price' => 25.00, 'image' => 'https://i.pinimg.com/564x/33/1a/ad/331aadbf9cf238f5a353ac8df1c5f208.jpg'),
    array('id' => 15, 'name' => 'KID pots', 'price' => 19.00, 'image' => 'https://i.pinimg.com/564x/31/57/53/31575318b9625750c05832ae55c5adf4.jpg'),
    array('id' => 16, 'name' => 'Nested pots', 'price' => 28.00, 'image' => 'https://i.pinimg.com/564x/26/d7/94/26d7940a8610b9800a23db966eed4028.jpg'),
    array('id' => 17, 'name' => 'Gold Iron pots', 'price' => 23.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/g/o/494x544/gold-iron-wine-glass-shape-desk-pot-planter--set-of-2-by-the-craze-by-amaya-decors-gold-iron-wine-gl-wegfsj.jpg'),
    array('id' => 18, 'name' => 'Railing pot ', 'price' => 13.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/w/h/494x544/white-metal-railing-planter-set-of-4-by-gold-dust-white-metal-railing-planter-set-of-4-by-gold-dust-f0zdg0.jpg'),
    array('id' => 19, 'name' => 'Ceramic pot', 'price' => 8.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/b/r/494x544/brown---white-ceramic-planter-by-tayhaa-brown---white-ceramic-planter-by-tayhaa-zu2xnw.jpg'),
    array('id' => 20, 'name' => 'Stand pot', 'price' => 18.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/b/l/494x544/black-iron-x-shaped-planter-stand-by-gig-handicrafts-black-iron-x-shaped-planter-stand-by-gig-handic-qy1itd.jpg'),
    array('id' => 21, 'name' => 'tUB POT', 'price' => 10.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/s/i/494x544/sicilian-grey-polymer-fabi-big-floor-planter-by-planters-sicilian-grey-polymer-fabi-big-floor-plante-5gkddb.jpg'),
    array('id' => 22, 'name' => 'Cart shape plant', 'price' => 33.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/w/h/494x544/white-iron-hand-cart-shaped-planter-stand-by-gig-handicrafts-white-iron-hand-cart-shaped-planter-sta-ffyedk.jpg'),
    array('id' => 23, 'name' => 'Cycle shape pot', 'price' => 25.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/b/l/494x544/black-iron-cycled-shaped-wall-planter-by-gig-handicrafts-black-iron-cycled-shaped-wall-planter-by-gi-r6swhj.jpg'),
    array('id' => 24, 'name' => 'Iron Wall pot', 'price' => 15.00, 'image' => 'https://ii1.pepperfry.com/media/catalog/product/b/l/494x544/black-and-red-iron-wall-planter-by-gig-handicrafts-black-and-red-iron-wall-planter-by-gig-handicraft-6cgn3u.jpg'),
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

<h2>Pots</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="product_list4.php">
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