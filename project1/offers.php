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
    array('id' => 1,'price' => 12.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-plant-nutrients-kit-for-healthy-flowering-summer-garden-809947_215x215.jpg?v=1682024391', 'name' => 'Plant nutrient kit'),
    array('id' => 2, 'name' => 'Bonsai' , 'Product 2', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-set-of-2-bonsai-looking-grafted-adeniums-779858_215x215.jpg?v=1680589601'),
    array('id' => 3, 'name' => 'Succulents', 'price' => 23.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-g-top-4-die-hard-succulents-pack-980804_215x215.jpg?v=1679751768'),
    array('id' => 4, 'name' => 'Fragnant', 'price' => 12.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-combo-packs-plants-5-best-fragrant-plants-16968509653132_215x215.jpg?v=1634209158'),
    array('id' => 5, 'name' => 'pebbles-30%off', 'price' => 25.00, 'image' => 'https://nurserylive.com/cdn/shop/collections/nurserylive-collection-pebbles-clearance-sale_300x300.jpg?v=1681381789'),
    array('id' => 6, 'name' => 'Planters-10%off', 'price' => 15.00, 'image' => 'https://nurserylive.com/cdn/shop/collections/nurserylive-collection-planters-clearance-sale_300x300.jpg?v=1681381786'),
    array('id' => 7, 'name' => 'Seeds_10%off', 'price' => 10.00, 'image' => 'https://nurserylive.com/cdn/shop/collections/nurserylive-collection-seeds-clearance-sale_300x300.jpg?v=1681381789'),
    array('id' => 8, 'name' => 'Vegetable -50% off', 'price' => 14.00, 'image' => 'https://nurserylive.com/cdn/shop/collections/nurserylive-vegetable-herb-seeds-category-image-293395_300x300.jpg?v=1681381876'),
    
   
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
           width: 300px;
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

<h2>Offers</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="pots.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>

<!-- Add a link to the cart page -->
<a href="cart.php"><button>View Cart</button></a>


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