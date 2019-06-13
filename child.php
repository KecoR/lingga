<?php

    $koneksi = new mysqli("localhost","mysqluser","mysql","db_lingga");

    if(isset($_POST["lid"])) {
        $cek = $_POST["lid"];

        $query1 = $koneksi->query("SELECT * FROM tblknowledge_child WHERE parrent = '$cek'");

        $rowCount = $query1->num_rows;

        if($rowCount > 0) {
            echo '<option selected disabled> Pilih Fungsi </option>';
            while($data1 = $query1->fetch_assoc()){
                echo '<option value="'.$data1['id'].'">'.$data1['child_name'].'</option>';
            }
        } else {
            echo '<option value="" selected>Tidak ada Fungsi</option>';
        }
    }

?>
