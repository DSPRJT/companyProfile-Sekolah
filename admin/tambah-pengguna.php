<?php include 'header.php' ?>

     <!-- content -->

     <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="boxHeader">
                    Tambah Pengguna
                </div>

                <div class="boxBody">

                    <form action="" method="post">
                        <div class="kolomInput">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="kolomText">
                        </div>
                        <div class="kolomInput">
                            <label>Username</label>
                            <input type="text" name="user" placeholder="Username" class="kolomText">
                        </div>
                        <div class="kolomInput">
                            <label>Password</label>
                            <input type="password" name="pass" placeholder="Password" class="kolomText">
                        </div>
                        <div class="kolomInput">
                            <label>level</label>
                            <select name="level" class="kolomText" >
                                <option value="">Pilih</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <a href="pengguna.php" class="btn btnKembali">Kembali</a>
                        <input type="submit" name="submit" value="simpan" class="btn btnLogin">
                    </form>
                    
                    <?php
                        if(isset($_POST['submit'])) {
                            

                            $nama   = mysqli_real_escape_string($con, ucwords($_POST['nama']));
                            $user   = mysqli_real_escape_string($con, $_POST['user']);
                            $pass   = mysqli_real_escape_string($con, $_POST['pass']);
                            $level  = $_POST['level'];

                            $hashed_password = hash('sha256', $pass);

                            $cek    = mysqli_query($con, "SELECT username From pengguna where username = '".$user."'");
                            if(mysqli_num_rows($cek)>0 ){
                                echo '<div class ="alert alertError">Username Sudah Digunakan </div>'; 
                            }else{
                                
                                $simpan = mysqli_query($con, "INSERT INTO pengguna (nama, username, password, level, created_at, updated_at)
                            VALUES ('".$nama."', '".$user."', '".$hashed_password."', '".$level."', NOW(), NOW())");

                            if($simpan) {
                                echo '<div class ="alert alertSucces">Berhasil di simpan</div>';
                                
                            }else {
                                echo 'Gagal di simpan' .mysqli_error($con);
                            }
                    }
                            }

                    ?>

                </div>

            </div>

        </div>
    
<?php include 'footer.php' ?>