<?php include 'header.php' ?>

<?php
    date_default_timezone_set("Asia/Jakarta");
    $pengguna = mysqli_query($con, "SELECT * FROM pengguna WHERE id = '".$_GET['id']."'");
    $p        = mysqli_fetch_object($pengguna);
?>
     <!-- content -->

     <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="boxHeader">
                    Ubah Password
                </div>

                <div class="boxBody">

                    <form action="" method="post">
                        <div class="kolomInput">
                            <label>Password</label>
                            <input type="password" name="pass1" placeholder="Password Baru" class="kolomText" >
                        </div>
                        <div class="kolomInput">
                            <label>Ulangi Password</label>
                            <input type="password" name="pass2" placeholder="Ulangi Password" class="kolomText" >
                        </div>
                       
                        
                        <a href="pengguna.php" class="btn btnKembali">Kembali</a>
                        <input type="submit" name="submit" value="Ubah Password" class="btn btnLogin">
                    </form>
                    
                    <?php
                        if(isset($_POST['submit'])) {
                            

                            $pass1   = $_POST['pass1'];
                            $pass2   = $_POST['pass2'];
                            $curdate = date('Y-m-d H:i:s');
                            
                            
                            if($pass2 != $pass1) {
                                echo '<div class ="alert alertError">Password Tidak Sama </div>'; 
                            }else{
                                $hashed_password = hash('sha256', $pass1);  
                                $update = mysqli_query($con, "UPDATE pengguna SET
                                    password = '".$hashed_password."',
                                    updated_at = '".$curdate."'
                                    WHERE id = '".$_SESSION['uid']."'
                            ");
                            

                                if($update) {
                                    echo '<div class ="alert alertSucces">Ubah Password Berhasil</div>';
                                    
                                }else {
                                    echo 'Gagal di Ubah' .mysqli_error($con);
                                }
                            }

                            
                        }
                    ?>

                </div>

            </div>

        </div>
    
<?php include 'footer.php' ?>