 <?php
session_start();
include("config.php");
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Invoice ID");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT invoices.id, patients.name, patients.phone, invoices.service, invoices.amount, invoices.date 
                        FROM invoices 
                        JOIN patients ON invoices.patient_id = patients.id 
                        WHERE invoices.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$inv = $result->fetch_assoc();

if (!$inv) {
    die("Invoice not found.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?php echo htmlspecialchars($inv['id']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-card {
            max-width: 600px;
            margin: 2rem auto;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            animation: slideIn 0.8s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .invoice-card, .invoice-card * {
                visibility: visible;
            }
            .invoice-card {
                position: absolute;
                left: 0;
                top: 0;
                margin: 0;
                box-shadow: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
<div class="container mt-4">
    <div class="invoice-card border p-4">
        <h2 class="text-center text-primary">🏥 My Hospital</h2>
        <hr>
        <p><b>Invoice ID:</b> <?php echo htmlspecialchars($inv['id']); ?><br>
        <b>Date:</b> <?php echo htmlspecialchars($inv['date']); ?></p>
        <p><b>Patient:</b> <?php echo htmlspecialchars($inv['name']); ?> (<?php echo htmlspecialchars($inv['phone']); ?>)</p>
        <table class="table table-bordered">
            <tr><th>Service</th><td><?php echo htmlspecialchars($inv['service']); ?></td></tr>
            <tr><th>Amount</th><td>₹<?php echo htmlspecialchars($inv['amount']); ?></td></tr>
        </table>
        <p class="text-center">🙏 Thank you. Get Well Soon.</p>
    </div>
</div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>