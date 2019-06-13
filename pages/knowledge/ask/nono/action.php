<?php
    session_start();
    $koneksi = new mysqli("localhost","mysqluser","mysql","db_lingga");
    $user = $_SESSION['user'];
    $parent = $_POST['knowledge'];
    $child = $_POST['child'];
    $info = $_POST['info'];
    $isi = stripslashes($_POST['content']);
    $date = date('d-m-Y');

    $sql1 = $koneksi->query("INSERT INTO tbl_request (id, user, knowledge_parent_id, knowledge_parent_name, knowledge_child_id, knowledge_child_name, info_name, content, tgl_request, tgl_accept, status_req) VALUES (NULL, '$user', '$parent', NULL, '$child', NULL, '$info', '$isi', '$date', NULL, '0')");

    if($sql1) {

        ?>
            <script>
                alert ("Data Berhasil Disimpan");
                window.location.href="/?page=knowledge";
            </script>
        <?php
    }
?>
