<?php
session_start();
$username_valid = "arzaki";
$password_valid = "123456";

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.html");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <?php
    if (($username == $username_valid) && ($password == $password_valid)) {
        $_SESSION["login"][] = [
            "username" => $username,
            "password" => $password,
            "login_at" => date("Y-m-d H:i:s")
        ];
    ?>
        <div class="container mt-5">
            <div class="card shadow mx-auto" style="max-width: 600px;">
                <div class="card-body text-center">
                    <div class="alert alert-success">
                        <h5>Selamat Datang: <?php echo $username; ?>, anda sudah login sebanyak: <?php echo count($_SESSION["login"]); ?> kali</h5>
                    </div>

                    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

                    <div class="bg-light p-3 rounded">
                        <strong>Session Data:</strong>
                        <pre class="mt-2 mb-0"><?php var_dump($_SESSION["login"]); ?></pre>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container mt-5">
            <div class="card shadow mx-auto" style="max-width: 400px;">
                <div class="card-body text-center">
                    <div class="alert alert-danger">
                        <h5>Username Atau Password Salah</h5>
                    </div>
                    <a href="index.html" class="btn btn-primary">Kembali ke Login</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>