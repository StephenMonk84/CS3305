<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Calculator with Discount</title>
</head>
<body>
    <h2>Order Calculator</h2>
    
    <!-- Order Form -->
    <form method="post" action="">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>

        <label for="price">Item Price ($):</label>
        <input type="number" step="0.01" name="price" id="price" required>
        <br><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <br><br>

        <label for="discount">Discount (%):</label>
        <input type="number" step="0.01" name="discount" id="discount" value="0">
        <br><br>
        
        <input type="submit" value="Calculate Total">
    </form>

    <?php
    // Function to calculate total cost including 10% sales tax
    function calculateTotal($price, $quantity) {
        $subtotal = $price * $quantity;
        $tax = $subtotal * 0.10; // 10% sales tax
        $total = $subtotal + $tax;
        return $total;
    }

    // Function to format product name
    function formatProductName($name) {
        $name = trim($name); // remove extra spaces
        $name = ucwords(strtolower($name)); // capitalize each word
        if (strlen($name) > 50) {
            $name = substr($name, 0, 50); // limit to 50 characters
        }
        return $name;
    }

    // Function to apply discount
    function calculateDiscount($price, $discountPercent) {
        if ($discountPercent < 0) {
            $discountPercent = 0;
        } elseif ($discountPercent > 100) {
            $discountPercent = 100;
        }
        $discountAmount = $price * ($discountPercent / 100);
        $finalPrice = $price - $discountAmount;
        return $finalPrice;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];

        // Format product name
        $formattedName = formatProductName($name);

        // Apply discount to item price
        $discountedPrice = calculateDiscount($price, $discount);

        // Calculate total using discounted price
        $totalAmount = calculateTotal($discountedPrice, $quantity);

        echo "<h3>Product: $formattedName</h3>";
        echo "<h3>Discount Applied: $discount%</h3>";
        echo "<h3>Total Amount (including 10% tax): $" . number_format($totalAmount, 2) . "</h3>";
        echo "<h3>Price after Discount: $" . number_format($discountedPrice, 2) . "</h3>";
    }
    ?>
</body>
</html>