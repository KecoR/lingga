<?php
    $id = $_GET['id'];

    $query = $koneksi->query("UPDATE tbl_request SET status_req = '-1' WHERE id = '$id'");

    if($query){
        ?>
            <script>
                alert("Data Berhasil Ditolak.");
                window.location.href="?page=knowledge";
            </script>
        <?php
    }
?>