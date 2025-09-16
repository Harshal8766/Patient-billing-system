 <?php
session_start();
include 'config.php'; // Include your database connection
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$patient_id = null;
$patient_details = null;
$patient_invoices = [];
$patient_feedback = [];

// Check if a specific patient ID is requested for details
if (isset($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];

    // Fetch patient details
    $stmt = $conn->prepare("SELECT id, name, age, gender, phone FROM patients WHERE id = ?");
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $patient_details = $result->fetch_assoc();
    $stmt->close();

    if ($patient_details) {
        // Fetch patient's invoices
        $stmt = $conn->prepare("SELECT id, service, amount, date FROM invoices WHERE patient_id = ? ORDER BY date DESC");
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();
        $patient_invoices = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        // Fetch patient's feedback
        $stmt = $conn->prepare("SELECT id, feedback, date FROM feedback WHERE patient_id = ? ORDER BY date DESC");
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();
        $patient_feedback = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        // Patient not found, redirect back to list or show error
        header("Location: view_patients.php");
        exit();
    }

} else {
    // Display all patients (list view)
    $search_query = "";
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search_query = $_GET['search'];
        $sql = "SELECT id, name, age, gender, phone FROM patients WHERE name LIKE ? ORDER BY name ASC";
        $stmt = $conn->prepare($sql);
        $param = "%" . $search_query . "%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "SELECT id, name, age, gender, phone FROM patients ORDER BY name ASC";
        $result = $conn->query($sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $patient_id ? 'Patient Details' : 'View Patients'; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .search-form, .details-card {
            background-color: #f8f9fa;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .details-card h4 {
            color: #007bff;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <?php if ($patient_id && $patient_details): // Display single patient details ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Patient Details: <?php echo htmlspecialchars($patient_details['name']); ?></h3>
            <a href="view_patients.php" class="btn btn-secondary">Back to All Patients</a>
        </div>

        <div class="details-card mb-4">
            <p><strong>ID:</strong> <?php echo htmlspecialchars($patient_details['id']); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($patient_details['age']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($patient_details['gender']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($patient_details['phone']); ?></p>
        </div>

        <h4 class="mt-4 mb-3">Treatment Records (Invoices)</h4>
        <div class="table-container mb-4">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Invoice ID</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($patient_invoices)): ?>
                        <?php foreach ($patient_invoices as $invoice): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($invoice['id']); ?></td>
                                <td><?php echo htmlspecialchars($invoice['service']); ?></td>
                                <td>₹<?php echo htmlspecialchars($invoice['amount']); ?></td>
                                <td><?php echo htmlspecialchars($invoice['date']); ?></td>
                                <td><a href="print_invoice.php?id=<?php echo htmlspecialchars($invoice['id']); ?>" class="btn btn-info btn-sm">🖨 Print</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">No treatment records found for this patient.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <h4 class="mt-4 mb-3">Patient Feedback</h4>
        <div class="table-container mb-4">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Feedback ID</th>
                        <th>Feedback</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($patient_feedback)): ?>
                        <?php foreach ($patient_feedback as $feedback): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($feedback['id']); ?></td>
                                <td><?php echo htmlspecialchars($feedback['feedback']); ?></td>
                                <td><?php echo htmlspecialchars($feedback['date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="3" class="text-center">No feedback found for this patient.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <?php else: // Display all patients list ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>All Patients</h3>
            <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>

        <div class="search-form mb-4">
            <form method="GET" action="view_patients.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by patient name..." name="search" value="<?php echo isset($search_query) ? htmlspecialchars($search_query) : ''; ?>">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <?php if (isset($search_query) && !empty($search_query)): ?>
                        <a href="view_patients.php" class="btn btn-outline-secondary">Clear</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Action</th> <!-- New Action column -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td>
                            <a href="view_patients.php?patient_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary btn-sm">View Details</a>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No patients found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
<?php
// Close statement if it was prepared in the else block (list view)
if (isset($stmt) && $patient_id === null) {
    $stmt->close();
}
$conn->close();
?