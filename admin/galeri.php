<?php include 'header.php' ?>

     <!-- content -->

     <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="boxHeader">
                Galeri
                </div>

                <div class="boxBody">



                    <a href="tambah-galeri.php" class="btn btnKembali"><i class="fa fa-plus"></i> Tambah</a>


                    <form action="">
                        <div class="inputGrup">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;

                                $where = " WHERE 1=1";
                                if(isset($_GET['key'])){
                                    $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                                }

                                $pengguna = mysqli_query($con, "SELECT * FROM pengguna $where ORDER BY id DESC");
                                if(mysqli_num_rows($pengguna)>0){
                                    while($p = mysqli_fetch_array($pengguna)){

                                    
                            ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['username'] ?></td>
                                <td><?= $p['level'] ?></td>
                                <td>
                                    <a href="edit-pengguna.php?id=<?= $p['id']?>"><i class="fa-regular fa-pen-to-square " style="color: #BC6C25; " title="Edit"></i></a>
                                    <a href="hapus.php?idpengguna=<?= $p['id']?>"><i class="fa-regular fa-square-minus" style="color:red" title="Hapus" onclick="return confirm('Yakin Ingin Hapus ?')"></i></a>
                                </td>
                            </tr>
                            <?php }}else{?>
                                <tr>
                                    <td colspan="5">Data tidak ada</td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    
<?php include 'footer.php' ?>