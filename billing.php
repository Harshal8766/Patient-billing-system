 <?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Invoices</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-info {
            transition: transform 0.2s ease-in-out;
        }
        .btn-info:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>All Invoices</h3>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
    <div class="table-container">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT i.id, p.name, i.service, i.amount, i.date 
                        FROM invoices AS i 
                        JOIN patients AS p ON i.patient_id = p.id 
                        ORDER BY i.id DESC";
                
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['service']); ?></td>
                    <td>₹<?php echo htmlspecialchars($row['amount']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><a href="print_invoice.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-info btn-sm">🖨 Print</a></td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No invoices found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<?php
$conn->close();
?>