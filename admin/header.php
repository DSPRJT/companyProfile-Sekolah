<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    include '../koneksi.php';
    if(!isset($_SESSION['status_login'])){
        echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TKQ Auzora Islamic School</title>
    <link rel="stylesheet" href="../assets/Style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/Fontawsome/fontawesome.min.css">
</head>
<body class="bgLight">
    
    <!-- navbar -->
     <div class="navbar">

        <div class="container">

            <!-- navbar brand -->
             <h2 class="navBrand"><a href="index.php">TKQ Auzora Islamic School</a></h2>

             <!-- navbar menu -->
              <ul class="navMenu">
                <li><a href="index.php">Dasboard</a></li>

                <?php if($_SESSION['ulevel'] == 'Super Admin'){ ?>

                    <li><a href="pengguna.php">Pengguna</a></li>

                
                <?php } elseif($_SESSION['ulevel'] == 'Admin'){ ?>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li>
                    <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

                    <!-- sub menu -->
                     <ul class="dropDown">
                        <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                        <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                     </ul>
                </li>
                <?php } ?>
                <li>
                    
                    <a href="#" class="settingAkun"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
                    <!-- sub menu -->
                    <ul class="dropDown">
                        <li><a href="ubah-password.php">Ubah Password</a></li>
                        <li><a href="logout.php">keluar</a></li>
                    </ul>
                </li>
              </ul>
              <div class="clearFix"></div>
        </div>
     </div>
