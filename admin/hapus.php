<?php

    include '../koneksi.php';
    
    if(isset($_GET['idpengguna'])) {
        $delete = mysqli_query($con, "DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."' ");
        echo "<script>window.location = 'pengguna.php'</script>";
    }

?>