<?php include 'header.php' ?>

<?php
    $pengguna = mysqli_query($con, "SELECT * FROM pengguna WHERE id = '".$_GET['id']."'");
    $p        = mysqli_fetch_object($pengguna);
?>
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
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="kolomText" value="<?= $p->nama?>">
                        </div>
                        <div class="kolomInput">
                            <label>Username</label>
                            <input type="text" name="user" placeholder="Username" class="kolomText" value="<?= $p->username?>">
                        </div>
                        <!-- <div class="kolomInput">
                            <label>Password</label>
                            <input type="password" name="pass" placeholder="Password" class="kolomText">
                        </div> -->
                        <div class="kolomInput">
                            <label>level</label>
                            <select name="level" class="kolomText" >
                                <option value="">Pilih</option>
                                <option value="Super Admin" <?= ($p->level == 'Super Admin') ? 'selected' : '' ?>>Super Admin</option>
                                <option value="Admin" <?= ($p->level == 'Admin') ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        <a href="pengguna.php" class="btn btnKembali">Kembali</a>
                        <input type="submit" name="submit" value="simpan" class="btn btnLogin">
                    </form>
                    
                    <?php
                        if(isset($_POST['submit'])) {
                            

                            $nama   = ucwords($_POST['nama']);
                            $user   = $_POST['user'];
                            $level  = $_POST['level'];
                            $curdate= date('Y-m-d H:i:s');

                            $update = mysqli_query($con, "UPDATE pengguna SET
                                    nama = '".$nama."',
                                    username = '".$user."',
                                    level = '".$level."',
                                    updated_at = '".$curdate."'
                                    WHERE id = '".$_GET['id']."'
                            ");
                            

                                if($update) {
                                    echo '<div class ="alert alertSucces">Berhasil di Edit</div>';
                                    
                                }else {
                                    echo 'Gagal di Edit' .mysqli_error($con);
                                }
                        }
                    ?>

                </div>

            </div>

        </div>
    
<?php include 'footer.php' ?>