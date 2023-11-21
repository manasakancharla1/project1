<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="sign in.css">
</head>
<body>
<div class="container">
<?php
    // Check if there's an error message in the URL query parameters
    if (isset($_GET['error'])) {
        echo "<p>Error: " . $_GET['error'] . "</p>";
    }

    // Check if there's a username in the URL query parameters (for successful login)
    if (isset($_GET['name'])) {
        echo "<h3>Welcome, " . $_GET['name'] . "!</h3>";
    }
    ?>
    <h2>Sign In</h2>    
    <form action="login_process.php" method="post">
        <label for="name">name:</label>
        <input type="name" name="name" required><br><br>
        <label for="password">password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br><br>
    <p class="para-2">Not have an Account?<a href="msqli.php">Sign-Up</a></p>
  </div>

   
</body>
</html>