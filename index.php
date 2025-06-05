<?php
session_start();
include 'db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        ul.nav {
            list-style: none;
            display: flex;
            padding: 0;
            margin-bottom: 20px;
        }

        ul.nav li {
            background: #4a90e2;
            padding: 10px 15px;
            margin-right: 10px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        ul.nav li:hover {
            background: #357ABD;
        }

        ul.nav li a {
            text-decoration: none;
            color: white;
            font-weight: 600;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        a button {
            padding: 8px 14px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }

        a button:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="nav">
            <li><a href="index.php">Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <h1>Products</h1>
        <a href="create.php"><button>Add Product</button></a>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['product_title'] ?></td>
                    <td><?php echo $row['product_desc'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
