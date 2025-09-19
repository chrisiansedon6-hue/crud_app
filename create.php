<?php
include 'config.php';

// Handle Create operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 10px;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="mb-4 text-center">
                    <i class="bi bi-plus-circle me-2 text-primary"></i> Add New Product
                </h3>

                <form method="post" action="create.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="bi bi-box-seam me-1 text-secondary"></i> Product Name
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <i class="bi bi-card-text me-1 text-secondary"></i> Description
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Write a short description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">
                            <i class="bi bi-cash-coin me-1 text-secondary"></i> Price
                        </label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="0.00" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
