 <?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #e3f2fd, #f1f8e9);
        }
        .navbar {
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-link {
            text-decoration: none;
            color: inherit;
        }
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 1rem;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: popIn 0.5s ease-in-out;
        }
        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">🏥 Hospital Billing</a>
        <div>
            <span class="text-white me-3">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row g-4">
        <div class="col-md-4">
            <a href="patient.php" class="card-link">
                <div class="card bg-light text-primary h-100">
                    <div class="card-body text-center">
                        <div class="icon">➕</div>
                        <h5 class="card-title">Add Patient</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="create_bill.php" class="card-link">
                <div class="card bg-light text-success h-100">
                    <div class="card-body text-center">
                        <div class="icon">💰</div>
                        <h5 class="card-title">Create Bill</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="billing.php" class="card-link">
                <div class="card bg-light text-warning h-100">
                    <div class="card-body text-center">
                        <div class="icon">🧾</div>
                        <h5 class="card-title">View Bills</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
                    <a href="feedback.php" class="card-link">
                                    <div class="card bg-light text-info h-100">
                                                        <div class="card-body text-center">
                                                                                <div class="icon">📝</div>
                                                                                                        <h5 class="card-title">Patient Feedback</h5>
                                                                                                                            </div>
                                                                                                                                            </div>
                                                                                                                                                        </a>
                                                                                                                                                                </div>
                                                                                                                                                                        <!-- NEW CARD FOR VIEW PATIENTS -->
                                                                                                                                                                                <div class="col-md-4">
                                                                                                                                                                                            <a href="view_patients.php" class="card-link">
                                                                                                                                                                                                            <div class="card bg-light text-secondary h-100"> <!-- Using text-secondary for a neutral color -->
                                                                                                                                                                                                                                <div class="card-body text-center">
                                                                                                                                                                                                                                                        <div class="icon">👥</div> <!-- Icon for viewing patients -->
                                                                                                                                                                                                                                                                                <h5 class="card-title">View Patients</h5>
                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                </a>
                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                            </div>
    </div>
</div>
</body>
</html>