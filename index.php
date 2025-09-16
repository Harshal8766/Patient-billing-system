 <?php
session_start();
include("config.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
        $password = $_POST['password'];

            // Hash the password with MD5 before checking
                $password_md5 = md5($password);

                    // Use prepared statements to prevent SQL injection
                        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
                            $stmt->bind_param("ss", $username, $password_md5);
                                $stmt->execute();
                                    $result = $stmt->get_result();

                                        if ($result->num_rows == 1) {
                                                $_SESSION['username'] = $username;
                                                        header("Location: dashboard.php");
                                                                exit();
                                                                    } else {
                                                                            $error = "Invalid Username or Password!";
                                                                                }

                                                                                    $stmt->close();
                                                                                    }
                                                                                    ?>
                                                                                    
<!DOCTYPE html>
<html>
<head>
    <title>Hospital Billing Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f2fe, #bbdefb);
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .card {
            border-radius: 1.5rem;
            animation: slideIn 0.8s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .btn-primary {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 w-100" style="max-width:400px;">
            <h3 class="text-center mb-4 text-primary">Reception Login</h3>
            <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
            <form method="post">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>