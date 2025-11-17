<?php 
include 'koneksi.php';

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Cek password dan confirm password
    if($password !== $confirm){
        echo "<script>
                alert('Password dan Confirm Password tidak sama!');
                window.location.href='register.php';
              </script>";
        exit;
    }

    // Jika sama → hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert ke database
    $query = mysqli_query($koneksi, "INSERT INTO users (email, password) VALUES ('$email', '$hashed')");

    if($query){
        header("Location: login.php?success=1");
    } else {
        echo "Gagal register!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Registration</title>
    <link rel="stylesheet" href="../css/rgister.css">
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
                Where Your Dream Destinations Become Reality.
            </p>
            <p class="description">
                Embark on a journey where every corner of the world is within your reach.
            </p>
        </div>

        <div class="registration-side">
            <div class="form-card">
                <h2>Create Your Account</h2>
                <form action="#" method="POST">
                    <div class="input-group">
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" required >
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Confirm Password" name="confirm" required>
                    </div>
                    <button type="submit" name="register" class="register-btn">REGISTER</button>
                </form>
                <p class="login-prompt">
                    Already have an account? <a href="login.php">Log in</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>