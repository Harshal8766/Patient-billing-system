 <?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) { header("Location: index.php"); exit(); }

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $service = $_POST['service'];
    $amount = $_POST['amount'];
    
    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO invoices (patient_id, service, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $patient_id, $service, $amount);
    
    if ($stmt->execute()) {
        $msg = "Bill generated successfully!";
    } else {
        $msg = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-control, .btn {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="container mt-5">
    <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="card-title mb-0">Create Bill</h2> <!-- Added mb-0 to remove bottom margin -->
                                    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                                            </div>
                                                    <?php if (!empty($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
                                                            <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Select Patient</label>
                <select name="patient_id" class="form-control" required>
                    <?php
                    $res = $conn->query("SELECT id, name FROM patients");
                    while ($row = $res->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Service</label>
                <input type="text" name="service" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Amount (₹)</label>
                <input type="number" name="amount" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Generate Bill</button>
        </form>
    </div>
</body>
</html>