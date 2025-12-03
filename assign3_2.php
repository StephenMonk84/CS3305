<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Manipulation Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2c3e50; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>PHP Array Manipulation Demo</h1>

    <?php
    // ============================
    // Task 1: Products - Deduplicate & Sort
    // ============================
    $products = [
        ["name" => "Laptop", "price" => 1200],
        ["name" => "Phone", "price" => 800],
        ["name" => "Tablet", "price" => 600],
        ["name" => "Laptop", "price" => 1200] // duplicate
    ];

    // Remove duplicates
    $uniqueProducts = array_map("unserialize", array_unique(array_map("serialize", $products)));

    // Sort by price ascending
    usort($uniqueProducts, function($a, $b) {
        return $a["price"] <=> $b["price"];
    });

    echo "<h2>Task 1: Available Products (Deduplicated & Sorted)</h2><pre>";
    foreach ($uniqueProducts as $p) {
        echo "Product: {$p['name']} | Price: {$p['price']}\n";
    }
    echo "</pre>";

    // ============================
    // Task 2: Apply 10% Discount to Electronics
    // ============================
    $productsWithCategory = [
        ["name" => "Laptop", "category" => "Electronics", "price" => 1200],
        ["name" => "Shoes", "category" => "Fashion", "price" => 100],
        ["name" => "Phone", "category" => "Electronics", "price" => 800],
        ["name" => "Book", "category" => "Education", "price" => 30]
    ];

    foreach ($productsWithCategory as &$p) {
        if ($p["category"] === "Electronics") {
            $p["price"] *= 0.9; // apply 10% discount
        }
    }

    echo "<h2>Task 2: Seasonal Sale (Electronics Discounted)</h2><pre>";
    foreach ($productsWithCategory as $p) {
        echo "{$p['name']} ({$p['category']}) - Price: {$p['price']}\n";
    }
    echo "</pre>";

    // ============================
    // Task 3: Merge Supplier Inventories
    // ============================
    $supplier1 = [
        ["name" => "Laptop", "price" => 1200],
        ["name" => "Shoes", "price" => 100]
    ];

    $supplier2 = [
        ["name" => "Phone", "price" => 800],
        ["name" => "Laptop", "price" => 1200] // duplicate
    ];

    $merged = array_merge($supplier1, $supplier2);

    // Remove duplicates
    $finalInventory = array_map("unserialize", array_unique(array_map("serialize", $merged)));

    echo "<h2>Task 3: Combined Supplier Inventory</h2><pre>";
    foreach ($finalInventory as $p) {
        echo "Product: {$p['name']} | Price: {$p['price']}\n";
    }
    echo "</pre>";
    ?>
</body>
</html>