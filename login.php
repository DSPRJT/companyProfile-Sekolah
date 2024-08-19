<?php
    include 'koneksi.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Style/styles.css">
    <title>Halaman Login</title>
</head>
<body>

    <!-- Halaman Login -->
    <div class="halamanLogin">

        <!-- Box Login -->
        <div class="box boxLogin">

            <!-- Box Header -->
            <div class="boxHeader textCenter">Login</div>

            <!-- Box Body -->
            <div class="boxBody">

                <?php
                    if(isset($_GET['msg'])){
                        echo "<div class='alert alertError'>".$_GET['msg']."</div>";
                    }
                ?>
                <form method="POST">

                    <!-- Kolom Input Username dan password -->
                    <div class="kolomInput">
                        <!-- Username -->
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="kolomText">
                    </div>

                    <div class="kolomInput">
                        <!-- Password -->
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Password" class="kolomText">
                    </div>

                    <input type="submit" name="submit" value="login" class="btn btnLogin">

                </form>

                <?php
                    if (isset($_POST['submit'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $hashed_password = hash('sha256', $pass);

                        $cek = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$user' AND password='$hashed_password'");
                        if (mysqli_num_rows($cek) > 0) {

                            $d = mysqli_fetch_object($cek);
                            $hashed_password = hash('sha256', $pass);

                            // if($hashed_password == $d->password) {

                                $_SESSION['status_login'] = true;
                                $_SESSION['uid'] = $d->id;
                                $_SESSION['uname'] = $d->nama;
                                $_SESSION['ulevel'] = $d->level;

                                echo "<script>window.location = 'admin/index.php'</script>";

                            // }else{
                            //     echo '<div class ="alert alertError">Password salah</div>';
                            // }

                        } else {
                            echo '<div class ="alert alertError">Username atau Password Salah </div>';
                        }
                    }
                ?>
            </div>

            <!-- Box Footer -->
            <div class="boxFooter textCenter">
                <a href="index.php" class="btnMenuutama">Kembali Halaman Utama</a>
            </div>
            
        </div>
        
    </div>
</body>
</html>
