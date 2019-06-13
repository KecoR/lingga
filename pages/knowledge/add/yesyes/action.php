<?php
    $koneksi = new mysqli("localhost","root","","db_lingga");
    $parent = $_POST['knowledge'];
    $child = $_POST['child'];
    $info = $_POST['info'];
    $isi = stripslashes($_POST['content']);

    // if($_POST['save']) {
    $sql0 = $koneksi->query("INSERT INTO tblknowledge (id, knowledge_name) VALUES (NULL, '$parent')");
    
    if($sql0) {
        $parentid = $koneksi->query("SELECT * FROM tblknowledge ORDER BY id  DESC LIMIT 1");
        $data0 = $parentid->fetch_assoc();
        $parent_id = $data0['id'];
        
        $sql = $koneksi->query("INSERT INTO tblknowledge_child (id, child_name, parrent) VALUES (NULL, '$child', '$parent_id')");

        if($sql) {
            $childid = $koneksi->query("SELECT * FROM tblknowledge_child ORDER BY id  DESC LIMIT 1");
            $data = $childid->fetch_assoc();
            $child_id = $data['id'];

            $sql1 = $koneksi->query("INSERT INTO tblknowledge_info (id, info_name, child_id) VALUES (NULL, '$info', '$child_id')");

            if($sql1) {
                $infoid = $koneksi->query("SELECT * FROM tblknowledge_info ORDER BY id  DESC LIMIT 1");
                $data1 = $infoid->fetch_assoc();
                $info_id = $data1['id'];
                
                $sql2 = $koneksi->query("INSERT INTO tblknowledge_content (id, content, info_id) VALUES (NULL, '$isi', '$info_id')");

                if($sql2) {
                    ?>
                        <script type="text/javascript">
                            
                            alert ("Data Berhasil Disimpan");
                            window.location.href="/lingga/?page=knowledge";

                        </script>
                    <?php
                }
            }
        }
    }
    // }
?>