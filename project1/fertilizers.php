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
    array('id' => 1,'price' => 120.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-vermicompost-1-kg-set-of-2-995020_260x260.jpg?v=1680589608', 'name' => 'Vermi Compost'),
    array('id' => 2, 'name' => 'Nutrient soil mix' , 'Product 2', 'price' => 150.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-nutrient-rich-general-purpose-potting-soil-mix-5-kg-16969046065292_260x260.jpg?v=1634224984'),
    array('id' => 3, 'name' => 'Jeevamrut', 'price' => 230.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-fertilizer-jeevamrut-plant-growth-tonic-500-ml-for-garden-1_jpg-195731_195x260.jpg?v=1680591235'),
    array('id' => 4, 'name' => 'Coco pleat', 'price' => 120.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-coco-peat-block-5-kg-16968789917836_260x260.jpg?v=1634216404'),
    array('id' => 5, 'name' => 'Plant o boost', 'price' => 250.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-seeds-plant-o-boost-overall-growth-booster-10-g-16969206300812_260x260.jpg?v=1634226254'),
    array('id' => 6, 'name' => 'Inoporom', 'price' => 150.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-inoprom-soil-special-all-purpose-organic-manure-1-kg-set-of-2-179073_260x260.jpg?v=1680591148'),
    array('id' => 7, 'name' => 'Neem cake', 'price' => 100.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-g-soil-and-fertilizers-neem-cake-1-kg-1-952723_195x260.jpg?v=1679750683'),
    array('id' => 8, 'name' => 'Perlite', 'price' => 140.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-perlite-500-g-1_195x260.jpg?v=1634225763'),
    array('id' => 9, 'name' => 'Neem Raksha', 'price' => 250.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-neem-raksha-pure-neem-oil-for-insect-pest-control-100-ml-image-2_260x260.jpg?v=1634224748'),
    array('id' => 10, 'name' => 'Rose booster', 'price' => 150.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-rose-blooster-50-ml-set-of-2-1-603469_195x260.jpg?v=1679751052'),
    array('id' => 11, 'name' => 'Meal Powder', 'price' => 180.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-fertilizer-bone-meal-powder-250-gm-for-garden_260x260.jpg?v=1634214743'),
    array('id' => 12, 'name' => 'Home compost', 'price' => 200.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-refill-pack-for-home-compost-kit-for-family-of-2_260x260.jpg?v=1634227397'),
    array('id' => 13, 'name' => 'All in one', 'price' => 320.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-all-in-one-garden-essentials-kit-1-500579_260x260.jpg?v=1679749034'),
    array('id' => 14, 'name' => 'Polestar', 'price' => 255.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-polestar-organic-food-waste-compost-1-kg-set-of-2-1_195x260.jpg?v=1634226539'),
    array('id' => 15, 'name' => 'Polutry Manure', 'price' => 195.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-processed-organic-poultry-manure-npk-rich-1-kg-set-of-2-1-628204_260x260.jpg?v=1679750985'),
    array('id' => 16, 'name' => 'Sea Seceret', 'price' => 289.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-sea-secret-sea-weed-extract-granules-500-g-set-of-2_195x260.jpg?v=1634228148'),
    array('id' => 17, 'name' => 'Desert Pride', 'price' => 235.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-desert-pride-cactus-and-succulent-plant-food-250-g-1_195x260.jpg?v=1634217854'),
    array('id' => 18, 'name' => 'Grow me Fast ', 'price' => 132.00, 'image' => 'https://nurserylive.com/cdn/shop/files/nurserylive-grow-me-fast-flowering-plant-growth-booster-spray-500-ml-1_512x512.jpg?v=1700475033'),
    array('id' => 19, 'name' => 'Guard', 'price' => 80.00, 'image' => 'https://nurserylive.com/cdn/shop/files/nurserylive-guard-360-plant-protector-spray-500-ml-1_512x512.jpg?v=1700475674'),
    array('id' => 20, 'name' => 'Root Rex', 'price' => 186.00, 'image' => 'https://nurserylive.com/cdn/shop/files/nurserylive-root-rex-plant-root-booster-spray-500-ml-1_512x512.jpg?v=1700471856'),
    array('id' => 21, 'name' => 'Sterameal', 'price' => 105.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-g-soil-and-fertilizers-sterameal-1-kg-236904_512x512.jpg?v=1679751741'),
    array('id' => 22, 'name' => 'General Soil', 'price' => 330.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-general-purpose-garden-potting-soil-mix-5-kg-16968874131596_260x260.jpg?v=1634220120'),
    array('id' => 23, 'name' => 'Cactus Soil', 'price' => 259.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-soil-and-fertilizers-potting-soil-mix-for-cactus-and-succulent-plants-3-kg-234654_260x260.jpg?v=1679750946'),
    array('id' => 24, 'name' => 'Lillies Soil', 'price' => 159.00, 'image' => 'https://nurserylive.com/cdn/shop/products/nurserylive-g-nutrient-rich-general-purpose-garden-potting-soil-mix-5-Kg-1_1_1-324894_260x260.jpg?v=1679750946'),
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

<h2>Fertilizers</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="fertilizers.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>
<p style="text-align: center;justify-items:center;font-weight:bold;color:white;margin-right:100px;font-size:30px">About Soil And Fertilizers</p>
<p style="color:orange"> 
Just like humans need food for sustainability, plants need soil and fertilizers that provide all the essential nutrients for them to grow. Whatever your gardening project, choosing the correct soil and fertilizers is crucial for your plants and garden’s health. At Nurserylive, we provide just that.<br><br>

If you are a gardening novice or an enthusiast looking to grow your own flower or vegetable garden, then these are the most convenient and cost-effective methods to ensure your plants are growing well.<br><br>

The fertilizers are rich in nitrogen, phosphorus and potassium that help your garden thrive. Our nutrient-rich soil encourages regular flowering and healthy foliage.<br><br>

From tonics to the potting soil mix, plant food to insect oil, organic poultry manure to plant and flower booster, we have it all in our soil and fertilizer collection.<br><br>

Under our soil and fertilizer category, you will find Soil Mix for lilies and bulbs, Polestar Organic Waste Compost, Plant Protection and Enhancer Kit, Coir Coin, Sanjeevani Rose Blooming Tonic, Jeevanamrut, Neem Raksha Oil amongst many other things.<br><br>

A little decor never hurt anybody. Along with our soil and fertilizers, you can also check our range of miniature toys to keep your plants looking pretty while looking healthy.<br><br>

Give your garden its best chance to bloom with Nurserylive’s range of soil and fertilizers that help you maintain a lush display of plants.
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