<?php
    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT *, tbl_request.id AS req_id, tblknowledge.knowledge_name, tblknowledge_child.child_name  FROM tbl_request LEFT JOIN tblknowledge ON tblknowledge.id = tbl_request.knowledge_parent_id LEFT JOIN tblknowledge_child ON tblknowledge_child.id = tbl_request.knowledge_child_id WHERE tbl_request.id = '$id'");

    $data = $sql->fetch_assoc();

    $info = $data['info_name'];
    $isi = $data['content'];

    if(!empty($data['knowledge_parent_id'])) {
        if(!empty($data['knowledge_child_id'])) {
            $child_id = $data['knowledge_child_id'];
            $sql = $koneksi->query("INSERT INTO tblknowledge_info (id, info_name, child_id) VALUES (NULL, '$info', '$child_id')");

            if($sql) {
                $infoid = $koneksi->query("SELECT * FROM tblknowledge_info ORDER BY id  DESC LIMIT 1");
                $data1 = $infoid->fetch_assoc();
                $info_id = $data1['id'];

                $sql1 = $koneksi->query("INSERT INTO tblknowledge_content (id, content, info_id) VALUES (NULL, '$isi', '$info_id')");

                if($sql1) {
                    $query = $koneksi->query("UPDATE tbl_request SET status_req = '1' WHERE id = '$id'");
                    if($query) {
                        ?>
                            <script>
                                alert ("Data Berhasil Disimpan");
                                window.location.href="?page=knowledge";
                            </script>
                        <?php
                    }
                }
            }
        } elseif (empty($data['knowledge_child_id'])) {
            $parent_id = $data['knowledge_parent_id'];
            $child = $data['knowledge_child_name'];
            $sql = $koneksi->query("INSERT INTO tblknowledge_child (id, child_name, parrent) VALUES (NULL, '$child', '$parent_id')");

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
                        $query = $koneksi->query("UPDATE tbl_request SET status_req = '1' WHERE id = '$id'");

                        if($query) {
                            ?>
                                <script type="text/javascript">
                                    
                                    alert ("Data Berhasil Disimpan");
                                    window.location.href="?page=knowledge";
            
                                </script>
                            <?php
                        }
                    }
                }
            }
        }
    } elseif (empty($data['knowledge_parent_id'])) {
        $parent = $data['knowledge_parent_name'];
        $child = $data['knowledge_child_name'];
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
                        $query = $koneksi->query("UPDATE tbl_request SET status_req = '1' WHERE id = '$id'");

                        if($query) {
                            ?>
                                <script type="text/javascript">
                                    
                                    alert ("Data Berhasil Disimpan");
                                    window.location.href="?page=knowledge";

                                </script>
                            <?php
                        }
                    }
                }
            }
        }
    }
?>