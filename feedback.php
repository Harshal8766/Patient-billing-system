 <?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) { header("Location: index.php"); exit(); }

$msg = "";
if (isset($_POST['submit_feedback'])) {
    $patient_id = $_POST['patient_id'];
    $feedback = $_POST['feedback'];
    
    // Using prepared statements
    $stmt = $conn->prepare("INSERT INTO feedback (patient_id, feedback) VALUES (?, ?)");
    $stmt->bind_param("is", $patient_id, $feedback);
    
    if ($stmt->execute()) {
        $msg = "Feedback saved!";
    } else {
        $msg = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Patient Feedback</h3>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
    <div class="card shadow-sm p-4 mb-4">
        <?php if (!empty($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
        <form method="post">
            <div class="mb-3">
                <label>Select Patient</label>
                <select name="patient_id" class="form-control" required>
                    <?php
                    $res = $conn->query("SELECT id, name, phone FROM patients");
                    while ($row = $res->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>" . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['phone']) . ")</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Feedback (Optional)</label>
                <textarea name="feedback" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit_feedback" class="btn btn-info">Save</button>
        </form>
    </div>

    <h4>All Feedbacks</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Feedback</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $all = $conn->query("SELECT feedback.id, patients.name, feedback.feedback, feedback.date 
                                     FROM feedback 
                                     JOIN patients ON feedback.patient_id=patients.id 
                                     ORDER BY feedback.id DESC");
                while ($row = $all->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['feedback']) . "</td>
                            <td>" . htmlspecialchars($row['date']) . "</td>
                          </tr>";
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