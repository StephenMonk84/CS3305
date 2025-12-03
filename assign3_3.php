<!DOCTYPE html>
<html>
<head>
    <title>PHP String Manipulation Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2c3e50; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>PHP String Manipulation Demo</h1>

    <?php
    // ============================
    // Task 1: Format product names & descriptions
    // ============================
    $products = [
        ["name" => "Laptop!!", "description" => "High_PERFORMANCE_DEVICE"],
        ["name" => "Phone@@@", "description" => "SMART_mobile_DEVICE"],
        ["name" => "Shoes###", "description" => "COMFORTABLE_FOOTWEAR"]
    ];

    echo "<h2>Task 1: Formatted Products</h2><pre>";
    foreach ($products as &$p) {
        // Convert description to lowercase and replace underscores with spaces
        $p["description"] = strtolower(str_replace("_", " ", $p["description"]));

        // Sanitize product name (remove special characters, keep letters/numbers/spaces)
        $p["name"] = preg_replace("/[^a-zA-Z0-9 ]/", "", $p["name"]);

        echo "Product: {$p['name']} | Description: {$p['description']}\n";
    }
    echo "</pre>";

    // ============================
    // Task 2: Analyze product description
    // ============================
    $description = "This is a high-quality leather wallet with RFID protection.";

    $charCount = strlen($description);
    $wordCount = str_word_count($description);
    $keyword = "leather";
    $keywordFound = (stripos($description, $keyword) !== false) ? "Keyword found" : "Keyword not found";

    echo "<h2>Task 2: Description Analysis</h2><pre>";
    echo "Description: $description\n";
    echo "Total Characters: $charCount\n";
    echo "Total Words: $wordCount\n";
    echo "$keywordFound\n";
    echo "</pre>";

    // ============================
    // Task 3: Process customer review
    // ============================
    $review = "Great product! Fast delivery and excellent service.";

    // Extract first 20 characters + "..."
    $preview = substr($review, 0, 20) . "...";

    // Search for "excellent"
    $pos = strpos(strtolower($review), "excellent");
    $positionMsg = ($pos !== false) ? "Found at position $pos" : "Not found";

    // Concatenate with thank-you message
    $updatedReview = $review . " Thank you for your feedback!";

    echo "<h2>Task 3: Customer Review Processing</h2><pre>";
    echo "Preview: $preview\n";
    echo "Search for 'excellent': $positionMsg\n";
    echo "Updated Review: $updatedReview\n";
    echo "</pre>";
    ?>
</body>
</html>