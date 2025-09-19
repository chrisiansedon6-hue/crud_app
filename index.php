<?php
include 'config.php';

// Handle Delete operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Management</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn {
            border-radius: 10px;
        }
        .header-title {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="header-title"><i class="bi bi-box-seam me-2"></i> Product Inventory</h2>
            <a href="create.php" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </a>
        </div>
        
        <div class="card p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Name</th>
                            <th width="35%">Description</th>
                            <th width="15%">Price</th>
                            <th width="25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Read operation
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr class='text-center'>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><strong>" . htmlspecialchars($row['name']) . "</strong></td>";
                                echo "<td class='text-start'>" . htmlspecialchars($row['description']) . "</td>";
                                echo "<td>$" . number_format($row['price'], 2) . "</td>";
                                echo "<td>";
                                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm me-2'>
                                        <i class='bi bi-pencil-square'></i> Edit
                                      </a>";
                                echo "<a href='index.php?delete=" . $row['id'] . "' class='btn btn-danger btn-sm' 
                                        onclick=\"return confirm('Are you sure you want to delete this product?');\">
                                        <i class='bi bi-trash'></i> Delete
                                      </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted py-4'>No products found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
