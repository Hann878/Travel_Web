<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($cek);

    if($data && password_verify($password, $data['password'])){
        $_SESSION['user'] = $data['email'];     // PENTING!
        header("Location: index.php");
        exit;
    } else {
        echo "Email / password salah!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Login</title>
    <link rel="stylesheet" href="../css/travel.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="marketing-side">
            <div class="logo">
                <span class="plane-icon">✈️</span> TRAVEL
            </div>
            <h1 class="main-title">EXPLORE HORIZONS</h1>
            <p class="subtitle">
                Selamat Datang Kembali.
            </p>
            <p class="description">
                Where your dream destinations become reality. Embark on a journey where every corner of the world is within your reach.
            </p>
        </div>

        <div class="login-side">
            <div class="form-card">
                <h2>Welcome Back!</h2>
                <form action="#" method="POST">
                    <div class="input-group">
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <?php if(isset($error)){ echo "<p style='color:red'>$error</p>"; } ?>
                    <button type="submit" class="login-btn" name="login">LOGIN</button>
                </form>
                
                <div class="extra-links">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <p class="register-prompt">
                    Don't have an account? <a href="register.php">Register here</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>