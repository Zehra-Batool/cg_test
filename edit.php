<?php
include 'db.php';

$error = '';
$id = $_GET['id'] ?? 0;

// Step 1: Get existing product data
$result = $conn->query("SELECT * FROM products WHERE id = $id");

if (!$result || $result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();
$title = $product['product_title'];
$product_description = $product['product_desc'];

// Step 2: If form submitted, update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title  = trim($_POST['title']);
    $product_description  = trim($_POST['product_desc']);

    if ($title == '' || $product_description == '') {
        $error = "All fields are required.";
    } else {
        $sql = "UPDATE products SET 
                product_title='$title', 
                product_desc='$product_description'
                WHERE id = $id";
        if ($conn->query($sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .fields {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button,
        a.back-btn {
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
        }

        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        a.back-btn {
            background-color: #6c757d;
            color: white;
        }

        a.back-btn:hover {
            background-color: #5a6268;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Product</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="fields">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($title) ?>" required>
        </div>

        <div class="fields">
            <label for="product_desc">Product Description:</label>
            <input type="text" name="product_desc" id="product_desc" value="<?= htmlspecialchars($product_description) ?>" required>
        </div>

        <button type="submit">Update Product</button>
        <a href="index.php" class="back-btn">Back to List</a>
    </form>
</div>

</body>
</html>
