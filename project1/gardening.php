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
    array('id' => 1,'price' => 10.00, 'image' => 'https://www.1800flowers.com/blog/wp-content/uploads/2022/06/red-roses.jpeg', 'name' => 'Red Rose'),
    array('id' => 2, 'name' => 'Blue Rose' , 'Product 2', 'price' => 15.00, 'image' => 'https://m.media-amazon.com/images/I/61nnpRh8OPL._AC_UF1000,1000_QL80_.jpg'),
    array('id' => 3, 'name' => 'White Rose', 'price' => 20.00, 'image' => 'https://img.freepik.com/free-photo/view-beautiful-blooming-rose-flowers_23-2150719029.jpg'),
    array('id' => 4, 'name' => 'Devils ivy', 'price' => 15.00, 'image' => 'http://t1.gstatic.com/images?q=tbn:ANd9GcTfmXKHczMP42m3NL5OpSRSezbJMgPF8xxCypWt97ju-WcPaiQNJcaHAXGT_xAYx-VClPRv'),
    array('id' => 5, 'name' => 'Jasmine', 'price' => 25.00, 'image' => 'https://admin.thegreenyard.in/uploads/product_images/109619431-Arabian-Jasmine.jpg'),
    array('id' => 6, 'name' => 'Mimea', 'price' => 25.00, 'image' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRAMmdRWoM538qNdmAXjjBiummTytqicTUQokSVpdBkhVXSLZBm'),
    array('id' => 7, 'name' => 'Snake Plant', 'price' => 25.00, 'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ8KleJ1SPIUMO-XPblXPVFbOkC_nxZZm8BaP9pezOG3-Q99q2o'),
    array('id' => 8, 'name' => 'Peace Lily', 'price' => 15.00, 'image' => 'data:image/jpeg;base64,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'),
    array('id' => 9, 'name' => 'Potatoes', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/digging-up-organic-potatoes-royalty-free-image-1683746846.jpg?crop=0.644xw:1.00xh;0.192xw,0&resize=980:*'),
    array('id' => 10, 'name' => 'Onions', 'price' => 55.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/bunch-of-onions-from-the-garden-after-recently-royalty-free-image-1683747767.jpg?crop=1.00xw:0.939xh;0,0.0359xh&resize=980:*'),
    array('id' => 11, 'name' => 'Okra', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/growing-okra-plant-royalty-free-image-1683748555.jpg?crop=1.00xw:0.833xh;0,0.0597xh&resize=980:*'),
    array('id' => 12, 'name' => 'Turnips', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/fresh-from-the-earth-royalty-free-image-1683748853.jpg?crop=0.669xw:1.00xh;0.148xw,0&resize=980:*'),
    array('id' => 13, 'name' => 'Bok Choy', 'price' => 35.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/hydroponic-pakcoy-vegetables-in-the-garden-royalty-free-image-1683749054.jpg?crop=0.679xw:0.906xh;0,0.0944xh&resize=980:*'),
    array('id' => 14, 'name' => 'Raddish', 'price' => 35.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/freshly-picked-radishes-lie-on-a-bed-royalty-free-image-1678986725.jpg?crop=0.535xw:1.00xh;0.0535xw,0&resize=980:*'),
    array('id' => 15, 'name' => 'Pumpkins', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/pumpkin-growth-in-my-garden-royalty-free-image-1678988674.jpg?crop=0.535xw:1.00xh;0.345xw,0&resize=980:*'),
    array('id' => 16, 'name' => 'Carrots', 'price' => 30.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/organic-carrots-growing-royalty-free-image-1678987521.jpg?crop=0.637xw:0.627xh;0.183xw,0.373xh&resize=980:*'),
    array('id' => 17, 'name' => 'Cabbage', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/chinese-cabbage-cultivation-royalty-free-image-1678988361.jpg?crop=0.535xw:1.00xh;0.242xw,0&resize=980:*'),
    array('id' => 18, 'name' => 'Beets', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/beets-growing-in-garden-royalty-free-image-1678988011.jpg?crop=0.9901xw:1xh;center,top&resize=980:*'),
    array('id' => 19, 'name' => 'Lettuce', 'price' => 45.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/mesclun-1616176779.jpg?crop=1xw:0.9997641509433962xh;center,top&resize=980:*'),
    array('id' => 20, 'name' => 'Tomateo', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/cherry-tomatoes-1616176919.jpg?crop=1xw:1xh;center,top&resize=980:*'),
    array('id' => 21, 'name' => 'Beans', 'price' => 35.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/beans-1616177083.jpg?crop=1xw:1xh;center,top&resize=980:*'),
    array('id' => 22, 'name' => 'Straw Berries', 'price' => 30.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/strawberries-2-1616177335.jpg?crop=1xw:0.9986187845303868xh;center,top&resize=980:*'),
    array('id' => 23, 'name' => 'Herbs', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/cilantro-1616177821.jpg?crop=0.9995119570522205xw:1xh;center,top&resize=980:*'),
    array('id' => 24, 'name' => 'Cuccumber', 'price' => 25.00, 'image' => 'https://hips.hearstapps.com/hmg-prod/images/cucumbers-1616177892.jpg?crop=0.8888888888888888xw:1xh;center,top&resize=980:*'),
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

<h2>Gardening</h2>

<!-- Display products with Add to Cart buttons -->
<div class='product-container'>
<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" style="width:100%;" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>

         

        <form method="post" action="gardening.php">
            <input type="hidden" name="item_id" value="<?php echo $product['id']; ?>">
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" name="quantity" id="quantity_<?php echo $product['id']; ?>" value="1" min="1">
            <input type="submit" name="add_to_cart" value="Add to Cart">
        </form>
    </div>

   

<?php endforeach; ?>
<p style="text-align: center;justify-items:center;font-weight:bold;color:white;margin-right:100px;font-size:30px">About Gardening</p>
<p style=color:orange;>

Gardening is not just an activity – for some, it is a stress release. For others, it is an escape into a world filled with hope and joy.<br>
<br>

While some people tend to their gardens just to prevent their plants from dying, others treat their gardens with care and love.<br><br>

Gardening helps improve physical fitness, builds mental resilience, and also helps unleash creativity. When there is so much that gardening can do for you, there must be something you can do to make your garden special!<br><br>

These days, people are looking for more intelligent gardening solutions. We have an extensive collection of seeds, plants, implements, and decorations.<br><br>

These will definitely make your beautiful garden stand out.<br><br>

The world of gardening revolves around flowering plants, sacred trees, greens, and even vegetables. Differing needs dictate the kind of gardening plants and tools.<br><br>

Remember to keep in mind the dynamics of your garden when selecting your gardening equipment and plants.<br><br>

A variety of gardening tools and implements can make the job easier and more fun. Individual gardening essentials like pots, soil, and saplings can be selected as convenient. Alternatively, you may also opt for complete gardening set to get you going.<br><br>

The right kind of accessories for your garden will make your garden look alluring. They will also make your effort more fruitful.<br><br>

A well-maintained garden must have a handy pair of shears, rake, and sprinkler. Ensure you add these to your gardening kit. It is a novel way to add some glamour, color, and character to your garden. You can also use accessories like pebbles, toys, and birdhouses.<br><br>

NurseryLive brings you the best quality and the latest gardening implements, ideas, and resources to make your dream garden a reality. Now space, logistics, and knowledge are no barrier to owning your dream island of greens!<br><br>
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