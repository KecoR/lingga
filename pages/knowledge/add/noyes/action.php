<?php
    $koneksi = new mysqli("localhost","mysqluser","mysql","db_lingga");
    $parent = $_POST['knowledge'];
    $child = $_POST['child'];
    $info = $_POST['info'];
    $isi = stripslashes($_POST['content']);

    // if($_POST['save']) {
    $sql = $koneksi->query("INSERT INTO tblknowledge_child (id, child_name, parrent) VALUES (NULL, '$child', '$parent')");

    if($sql) {
        $childid = $koneksi->query("SELECT * FROM tblknowledge_child ORDER BY id  DESC LIMIT 1");
        $data = $childid->fetch_assoc();
        $child_id = $data['id'];

        $sql1 = $koneksi->query("INSERT INTO tblknowledge_info (id, info_name, child_id) VALUES (NULL, '$info', $child_id)");

        if($sql1) {
            $infoid = $koneksi->query("SELECT * FROM tblknowledge_info ORDER BY id  DESC LIMIT 1");
            $data1 = $infoid->fetch_assoc();
            $info_id = $data1['id'];
            
            $sql2 = $koneksi->query("INSERT INTO tblknowledge_content (id, content, info_id) VALUES (NULL, '$isi', '$info_id')");

            if($sql2) {
                ?>
                    <script type="text/javascript">
                        
                        alert ("Data Berhasil Disimpan");
                        window.location.href="/?page=knowledge";

                    </script>
                <?php
            }
        }
    }
    // }
?>
