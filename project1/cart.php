<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css"> <!-- Include your CSS file here -->
</head>
<body>

<!-- Your cart.php content goes here -->

</body>
</html>

<?php
session_start();

// Function to remove an item from the cart
function removeFromCart($item_id) {
    // Find the item in the cart by its ID
    $item_key = array_search($item_id, array_column($_SESSION['cart'], 'id'));

    // Remove one quantity of the item from the cart if found
    if ($item_key !== false) {
        $_SESSION['cart'][$item_key]['quantity']--;
        
        // Remove the item completely if the quantity becomes zero
        if ($_SESSION['cart'][$item_key]['quantity'] <= 0) {
            unset($_SESSION['cart'][$item_key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset array keys
        }
    }
}

// Function to increase the quantity of an item in the cart
function increaseQuantity($item_id) {
    // Find the item in the cart by its ID
    $item_key = array_search($item_id, array_column($_SESSION['cart'], 'id'));

    // Increase the quantity of the item in the cart if found
    if ($item_key !== false) {
        $_SESSION['cart'][$item_key]['quantity']++;
    }
}

// Check if the remove or increase button is clicked
if (isset($_POST['remove_from_cart']) && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    removeFromCart($item_id);
}

if (isset($_POST['increase_quantity']) && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    increaseQuantity($item_id);
}

// Display the cart contents and calculate total
echo "<h2>Shopping Cart</h2>";

$total = 0;

if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<table border='1'>";
    echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";

    foreach ($_SESSION['cart'] as $item) {
        $itemTotal = $item['price'] * $item['quantity'];
        $total += $itemTotal;

        echo "<tr>";
        echo "<td>{$item['name']}";

        // Check if 'image' key exists before using it
        if (isset($item['image'])) {
            echo "<br><img src='{$item['image']}' alt='{$item['image']}' style='max-width: 50px; max-height: 50px;'>";
        }

        echo "</td>";
        echo "<td>\${$item['price']}</td>";
        echo "<td>{$item['quantity']}</td>";
        echo "<td>\${$itemTotal}</td>";
        echo "<td>";
        echo "<form method='post' action='cart.php' style='display:inline;'>";
        echo "<input type='hidden' name='item_id' value='{$item['id']}'>";
        echo "<input type='submit' name='remove_from_cart' value='Remove'>";
        echo "</form>";

        // Add a button to increase quantity
        echo "<form method='post' action='cart.php' style='display:inline;'>";
        echo "<input type='hidden' name='item_id' value='{$item['id']}'>";
        echo "<input type='submit' name='increase_quantity' value='Increase Quantity'>";
        echo "</form>";

        echo "</td>";
        echo "</tr>";
    }

    // Display the total row
    echo "<tr>";
    echo "<td colspan='3'><strong>Total:</strong></td>";
    echo "<td>\${$total}</td>";
    echo "<td></td>";  // Leave the Action column empty for the total row
    echo "</tr>";

    echo "</table>";
}

// Add a link back to the product list page
echo "<a href='index.html'>Back to Home</a>";
?>