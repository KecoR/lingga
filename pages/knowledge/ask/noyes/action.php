<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","db_lingga");
    $user = $_SESSION['user'];
    $parent = $_POST['knowledge'];
    $child = $_POST['child'];
    $info = $_POST['info'];
    $isi = stripslashes($_POST['content']);
    $date = date('d-m-Y');

    $sql = $koneksi->query("INSERT INTO tbl_request (id, user, knowledge_parent_id, knowledge_parent_name, knowledge_child_id, knowledge_child_name, info_name, content, tgl_request, tgl_accept, status_req) VALUES (NULL, '$user', '$parent', NULL, NULL, '$child', '$info', '$isi', '$date', NULL, '0')");

    if($sql) {
        
        ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan");
                window.location.href="/lingga/?page=knowledge";

            </script>
        <?php
    }
?>