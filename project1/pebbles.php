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
    array('id' => 1,'price' => 110.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-onex-pebbles-blue-medium-1-kg-16969325576332_260x260.jpg?v=1634225037', 'name' => 'Onex pebbles'),
    array('id' => 2, 'name' => 'Aquarium(y)' , 'Product 2', 'price' => 158.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-aquarium-pebbles-yellow-small-1-kg-16969334096012_260x260.jpg?v=1634213533'),
    array('id' => 3, 'name' => 'Aquarium(R)', 'price' => 240.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-aquarium-pebbles-red-small-1-kg-16969334030476_260x260.jpg?v=1634213521'),
    array('id' => 4, 'name' => 'Stone Stand', 'price' => 100.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-stone-sand-red-1-kg-16969352478860_260x260.jpg?v=1634229339'),
    array('id' => 5, 'name' => 'Stone Stand', 'price' => 252.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-stone-sand-dark-pink-1-kg-16969352347788_260x260.jpg?v=1634229335'),
    array('id' => 6, 'name' => 'Chip pebbles', 'price' => 158.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-chips-pebbles-black-small-polished-1-kg-16968780447884_260x260.jpg?v=1634216049'),
    array('id' => 7, 'name' => 'marble pebbles', 'price' => 104.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-marble-chips-pebbles-mix-color-small-polished-1-kg-1_260x260.jpg?v=1678433417'),
    array('id' => 8, 'name' => 'Aquarium Pebbles', 'price' => 143.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-aquarium-pebbles-blue-small-1-kg-16969332129932_260x260.jpg?v=1634213448'),
    array('id' => 9, 'name' => 'River Pebbles', 'price' => 251.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-river-pebbles-camel-color-medium-1-kg-16969334390924_260x260.jpg?v=1634227596'),
    array('id' => 10, 'name' => 'Jasper Pebbles', 'price' => 56.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-jasper-garden-pebbles-red-medium-1-kg-16969336127628_260x260.jpg?v=1634222614'),
    array('id' => 11, 'name' => 'Sand Stone', 'price' => 188.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-stone-sand-yellow-1-kg-16969352544396_260x260.jpg?v=1634229354'),
    array('id' => 12, 'name' => 'Garden pebbles', 'price' => 20.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-garden-pebbles-camel-color-medium-1-kg-16969334947980_260x260.jpg?v=1634219882'),
    array('id' => 13, 'name' => 'Stone Sand', 'price' => 325.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-stone-sand-white-1-kg-16969352413324_260x260.jpg?v=1634229350'),
    array('id' => 14, 'name' => 'Flat river', 'price' => 230.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-flat-river-pebbles-grey-big-polished-2-kg-16968862695564_260x260.jpg?v=1634219682'),
    array('id' => 15, 'name' => 'Granite pebbles', 'price' => 150.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-super-granite-pebbles-black-medium-polished-1-kg-16969359556748_260x260.jpg?v=1634229497'),
    array('id' => 16, 'name' => 'Zebra pebbles', 'price' => 280.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-pebbles-zebra-pebbles-mix-color-medium-1-kg-16969439674508_512x512.jpg?v=1634231818'),
    
  
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

<h2>Pebbles</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="pebbles.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>
&ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
<p style="text-align: center;justify-items:center;font-weight:bold;color:white;margin-right:100px">About Trending Pebbles</p><br>
<p style=" color:white;">Looking to add a touch of beauty and sophistication to your garden or home decor? Look no further than our Trending Pebbles collection!<br><br>

->Our collection includes a wide variety of pebbles that are popular and in-demand, making it easy for you to stay up-to-date with the latest gardening and decor trends.<br><br>

->Our Trending Pebbles collection includes a wide variety of options, from classic river rocks and beach pebbles to exotic and unique options like glass and crystal pebbles.<br><br>

->Each pebble has been carefully selected for its quality, beauty, and versatility, making it perfect for a variety of applications.<br><br>

->If you're looking for pebbles that are perfect for creating a Zen garden or rock garden, our Natural Pebbles collection includes a variety of options, from river rocks and polished pebbles to Himalayan salt rocks and lava rocks.<br><br>

->And for those who want to add a touch of color and sparkle to their garden or home decor, our Decorative Pebbles collection includes a variety of options, from glass pebbles and crystal pebbles to metallic and glitter pebbles.<br><br>

->If you're looking for pebbles that are perfect for water features and aquariums, our Aquatic Pebbles collection includes a variety of options, from smooth river rocks and beach pebbles to colorful glass pebbles and crystal pebbles.<br><br>

->And for those who want to add a touch of elegance and sophistication to their space, our Designer Pebbles collection includes a variety of options, from black and white marble pebbles to polished gemstones and crystals.<br><br>

->In addition to our collections, we also offer a wide range of gardening supplies and products, including plants, pots, and gardening tools, to help you create the perfect garden. Plus, our website offers a wealth of information and resources, from gardening tips and tricks to plant care guides and more, to help you become a master gardener.<br><br>

->At Nurserylive, we are committed to providing our customers with the highest quality plant products and gardening supplies, as well as exceptional customer service. Whether you're a beginner or an experienced gardener, we're here to help you create the garden of your dreams. So why wait? Start exploring our Trending Pebbles collection today and experience the beauty and versatility of pebbles with Nurserylive!<br><br>

->In conclusion, pebbles can add a touch of beauty and sophistication to any garden or home decor. With our Trending Pebbles collection, it's easy to find the latest and greatest pebble options, from natural river rocks and beach pebbles to exotic and unique options like glass and crystal pebbles. Whether you're looking for pebbles for a Zen garden, water feature, or aquarium, our collection has something for everyone. So why wait? Start shopping today and add some beauty and sparkle to your life with Nurseryli</p>
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